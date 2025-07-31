<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageService
{
    private const IMAGE_WIDTH = 800;

    private const IMAGE_HEIGHT = 800;

    public static function upload($imageFile, $folderName)
    {
        if (is_null($imageFile)) {
            return null;
        }

        $fileName = uniqid(rand().'_');
        $extension = $imageFile->extension();
        $fileNameToStore = $fileName.'.'.$extension;
        $resizedImage = Image::make($imageFile)
            ->fit(self::IMAGE_WIDTH, self::IMAGE_HEIGHT)
            ->encode();
        Storage::put('public/'.$folderName.'/'.$fileNameToStore, $resizedImage);

        return $fileNameToStore;
    }
}
