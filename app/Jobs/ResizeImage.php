<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Spatie\Image\Enums\CropPosition;
use Spatie\Image\Enums\ImageDriver;
use Spatie\Image\Image;

class ResizeImage implements ShouldQueue
{
    use Queueable;

    private $w;
    private $h;
    private $fileName;
    private $path;

    public function __construct($filePath, $w, $h)
    {
        $this->path = dirname($filePath);
        $this->fileName = basename($filePath);
        $this->w = $w;
        $this->h = $h;
    }

    public function handle(): void
    {
        $srcPath = storage_path(
            'app/public/' . $this->path . '/' . $this->fileName
        );

        $cropPath = storage_path(
            'app/public/' .
            $this->path .
            "/crop_{$this->w}x{$this->h}_" .
            $this->fileName
        );

        $watermarkPath = public_path(
            'images/presto_watermark.png'
        );

        if (!file_exists($srcPath) || !file_exists($watermarkPath)) {
            return;
        }

        Image::useImageDriver(ImageDriver::Gd)
            ->load($srcPath)
            ->crop(
                $this->w,
                $this->h,
                CropPosition::Center
            )
            ->save($cropPath);

        $info = getimagesize($srcPath);

        if (!$info) {
            return;
        }

        switch ($info['mime']) {
            case 'image/jpeg':
                $image = imagecreatefromjpeg($srcPath);
                break;

            case 'image/png':
                $image = imagecreatefrompng($srcPath);
                break;

            case 'image/webp':
                $image = imagecreatefromwebp($srcPath);
                break;

            default:
                return;
        }

        if (!$image) {
            return;
        }

        $logo = imagecreatefrompng($watermarkPath);

        if (!$logo) {
            imagedestroy($image);
            return;
        }

        $logoWidth = 120;

        $logoHeight = (int) (
            imagesy($logo) *
            ($logoWidth / imagesx($logo))
        );

        $smallLogo = imagecreatetruecolor(
            $logoWidth,
            $logoHeight
        );

        imagealphablending($smallLogo, false);
        imagesavealpha($smallLogo, true);

        $transparent = imagecolorallocatealpha(
            $smallLogo,
            0,
            0,
            0,
            127
        );

        imagefill(
            $smallLogo,
            0,
            0,
            $transparent
        );

        imagecopyresampled(
            $smallLogo,
            $logo,
            0,
            0,
            0,
            0,
            $logoWidth,
            $logoHeight,
            imagesx($logo),
            imagesy($logo)
        );

        $margin = 20;

        $x = imagesx($image) - $logoWidth - $margin;
        $y = imagesy($image) - $logoHeight - $margin;

        $x = max(0, $x);
        $y = max(0, $y);

        imagealphablending($image, true);

        imagecopy(
            $image,
            $smallLogo,
            $x,
            $y,
            0,
            0,
            $logoWidth,
            $logoHeight
        );

        switch ($info['mime']) {
            case 'image/jpeg':
                imagejpeg($image, $srcPath, 90);
                break;

            case 'image/png':
                imagepng($image, $srcPath);
                break;

            case 'image/webp':
                imagewebp($image, $srcPath, 90);
                break;
        }

        imagedestroy($logo);
        imagedestroy($smallLogo);
        imagedestroy($image);
    }
}