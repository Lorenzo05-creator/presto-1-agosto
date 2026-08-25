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

class GoogleVisionSafeSearch implements ShouldQueue
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

        $imagePath = storage_path('app/public/' . $image->path);

        if (!file_exists($imagePath)) {
            return;
        }

        putenv(
            'GOOGLE_APPLICATION_CREDENTIALS=' .
            base_path('google_credential.json')
        );

        $googleVisionClient = new ImageAnnotatorClient();

        $googleImage = new VisionImage();
        $googleImage->setContent(file_get_contents($imagePath));

        $googleFeature = new Feature();
        $googleFeature->setType(
            Feature\Type::SAFE_SEARCH_DETECTION
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
            $googleVisionClient->close();
            return;
        }

        $safe = $responses[0]->getSafeSearchAnnotation();
        

        if (!$safe) {
            $googleVisionClient->close();
            return;
        }

       $image->adult = $safe->getAdult();
$image->spoof = $safe->getSpoof();
$image->racy = $safe->getRacy();
$image->medical = $safe->getMedical();
$image->violence = $safe->getViolence();

$image->save();

        $googleVisionClient->close();
    }
}