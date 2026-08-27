<?php

namespace App\Jobs;

use App\Models\Image;
use Google\Cloud\Vision\V1\AnnotateImageRequest;
use Google\Cloud\Vision\V1\BatchAnnotateImagesRequest;
use Google\Cloud\Vision\V1\Client\ImageAnnotatorClient;
use Google\Cloud\Vision\V1\Feature;
use Google\Cloud\Vision\V1\Image as VisionImage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RemoveFaces implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public Image $image
    ) {
    }

    public function handle(): void
    {
        $image = $this->image;

        if (!$image->path) {
            return;
        }

        $imagePath = storage_path(
            'app/public/' . $image->path
        );

        if (!file_exists($imagePath)) {
            \Log::warning('RemoveFaces: immagine non trovata', [
                'image_id' => $image->id,
                'path' => $imagePath,
            ]);

            return;
        }

        putenv(
            'GOOGLE_APPLICATION_CREDENTIALS=' .
            base_path('google_credential.json')
        );

        $googleVisionClient = new ImageAnnotatorClient();

        try {
            $googleImage = new VisionImage();

            $googleImage->setContent(
                file_get_contents($imagePath)
            );

            $googleFeature = new Feature();

            $googleFeature->setType(
                Feature\Type::FACE_DETECTION
            );

            $request = new AnnotateImageRequest();

            $request->setImage($googleImage);
            $request->setFeatures([$googleFeature]);

            $batchRequest = new BatchAnnotateImagesRequest();

            $batchRequest->setRequests([$request]);

            $response = $googleVisionClient->batchAnnotateImages(
                $batchRequest
            );

            $responses = $response->getResponses();

            if (count($responses) === 0) {
                return;
            }

            $faces = $responses[0]->getFaceAnnotations();

            \Log::info('RemoveFaces: volti trovati', [
                'image_id' => $image->id,
                'count' => count($faces),
            ]);

            if (count($faces) === 0) {
                return;
            }

            $imageInfo = getimagesize($imagePath);

            if (!$imageInfo) {
                return;
            }

            $imageWidth = $imageInfo[0];
            $imageHeight = $imageInfo[1];
            $mimeType = $imageInfo['mime'];

            switch ($mimeType) {
                case 'image/jpeg':
                    $sourceImage = imagecreatefromjpeg($imagePath);
                    break;

                case 'image/png':
                    $sourceImage = imagecreatefrompng($imagePath);
                    break;

                case 'image/webp':
                    $sourceImage = imagecreatefromwebp($imagePath);
                    break;

                default:
                    \Log::error('RemoveFaces: formato non supportato', [
                        'image_id' => $image->id,
                        'mime' => $mimeType,
                    ]);

                    return;
            }

            if (!$sourceImage) {
                return;
            }

            foreach ($faces as $face) {
                $vertices = $face
                    ->getBoundingPoly()
                    ->getVertices();

                if (count($vertices) < 4) {
                    continue;
                }

                $xs = [];
                $ys = [];

                foreach ($vertices as $vertex) {
                    $xs[] = $vertex->getX();
                    $ys[] = $vertex->getY();
                }

                $x = min($xs);
                $y = min($ys);

                $faceWidth = max($xs) - $x;
                $faceHeight = max($ys) - $y;

                $paddingX = (int) ($faceWidth * 0.08);
                $paddingY = (int) ($faceHeight * 0.08);

                $x -= $paddingX;
                $y -= $paddingY;

                $faceWidth += $paddingX * 2;
                $faceHeight += $paddingY * 2;

                $x = max(0, $x);
                $y = max(0, $y);

                if ($x + $faceWidth > $imageWidth) {
                    $faceWidth = $imageWidth - $x;
                }

                if ($y + $faceHeight > $imageHeight) {
                    $faceHeight = $imageHeight - $y;
                }

                if ($faceWidth <= 0 || $faceHeight <= 0) {
                    continue;
                }

                $faceImage = imagecrop($sourceImage, [
                    'x' => $x,
                    'y' => $y,
                    'width' => $faceWidth,
                    'height' => $faceHeight,
                ]);

                if ($faceImage !== false) {
                    $smallWidth = max(
                        4,
                        (int) ($faceWidth / 12)
                    );

                    $smallHeight = max(
                        4,
                        (int) ($faceHeight / 12)
                    );

                    $pixelated = imagecreatetruecolor(
                        $smallWidth,
                        $smallHeight
                    );

                    imagecopyresampled(
                        $pixelated,
                        $faceImage,
                        0,
                        0,
                        0,
                        0,
                        $smallWidth,
                        $smallHeight,
                        $faceWidth,
                        $faceHeight
                    );

                    imagecopyresampled(
                        $faceImage,
                        $pixelated,
                        0,
                        0,
                        0,
                        0,
                        $faceWidth,
                        $faceHeight,
                        $smallWidth,
                        $smallHeight
                    );

                    imagecopy(
                        $sourceImage,
                        $faceImage,
                        $x,
                        $y,
                        0,
                        0,
                        $faceWidth,
                        $faceHeight
                    );

                    imagedestroy($pixelated);
                    imagedestroy($faceImage);
                }

                \Log::info('RemoveFaces: censura applicata', [
                    'image_id' => $image->id,
                    'x' => $x,
                    'y' => $y,
                    'width' => $faceWidth,
                    'height' => $faceHeight,
                ]);
            }

            switch ($mimeType) {
                case 'image/jpeg':
                    imagejpeg(
                        $sourceImage,
                        $imagePath,
                        90
                    );
                    break;

                case 'image/png':
                    imagepng(
                        $sourceImage,
                        $imagePath
                    );
                    break;

                case 'image/webp':
                    imagewebp(
                        $sourceImage,
                        $imagePath,
                        90
                    );
                    break;
            }

            imagedestroy($sourceImage);

            \Log::info(
                'RemoveFaces: immagine salvata correttamente',
                [
                    'image_id' => $image->id,
                    'path' => $imagePath,
                ]
            );
        } finally {
            $googleVisionClient->close();
        }
    }
}