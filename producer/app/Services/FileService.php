<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class FileService
{
    public static function saveImage(UploadedFile $image, string $folder = 'uploads')
    {
        $fileName = time().'_'.$image->getClientOriginalName();

        return $image->storeAs($folder, $fileName, 'public');
    }
}
