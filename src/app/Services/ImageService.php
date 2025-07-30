<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

Class ImageService
{
    public static function upload($imageFile, $folderName){
        if(!is_null($imageFile)){
            $fileName = uniqid(rand().'_');
            $extension = $imageFile->extension();
            $fileNameToStore = $fileName. '.' . $extension;
            $resizedImage = Image::make($imageFile)->fit(800, 800)->encode();
            Storage::put('public/' . $folderName . '/' . $fileNameToStore, $resizedImage );
            return $fileNameToStore; 
        }

        return null;
    }
}