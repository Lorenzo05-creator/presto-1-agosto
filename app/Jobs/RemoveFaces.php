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
use Spatie\Image\Enums\AlignPosition;
use Spatie\Image\Enums\Fit;
use Spatie\Image\Image as SpatieImage;

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

        $srcPath = storage_path(
            'app/public/' . $image->path
        );

        if (!file_exists($srcPath)) {
            return;
        }

        putenv(
            'GOOGLE_APPLICATION_CREDENTIALS=' .
            base_path('google_credential.json')
        );

        $googleVisionClient = new ImageAnnotatorClient();

        $googleImage = new VisionImage();

        $googleImage->setContent(
            file_get_contents($srcPath)
        );

        $googleFeature = new Feature();

        $googleFeature->setType(
            Feature\Type::FACE_DETECTION
        );

        $request = new AnnotateImageRequest();

        $request->setImage($googleImage);

        $request->setFeatures([
            $googleFeature,
        ]);

        $batchRequest = new BatchAnnotateImagesRequest();

        $batchRequest->setRequests([
            $request,
        ]);

        $response = $googleVisionClient->batchAnnotateImages(
            $batchRequest
        );

        $responses = $response->getResponses();

        if (count($responses) === 0) {
            $googleVisionClient->close();

            return;
        }

        $faces = $responses[0]->getFaceAnnotations();

        foreach ($faces as $face) {
            $vertices = $face
                ->getBoundingPoly()
                ->getVertices();

            $bounds = [];

            foreach ($vertices as $vertex) {
                $bounds[] = [
                    'x' => $vertex->getX(),
                    'y' => $vertex->getY(),
                ];
            }

            if (count($bounds) < 3) {
                continue;
            }

            $width = $bounds[1]['x'] - $bounds[0]['x'];

            $height = $bounds[2]['y'] - $bounds[1]['y'];

            SpatieImage::load($srcPath)
                ->watermark(
                    base_path('public/images/face.png'),
                    position: AlignPosition::TopLeft,
                    paddingX: $bounds[0]['x'],
                    paddingY: $bounds[0]['y'],
                    width: $width,
                    height: $height,
                    fit: Fit::Stretch
                )
                ->save($srcPath);
        }

        $googleVisionClient->close();
    }
}