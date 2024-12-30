<?php
namespace App\Services;

class FileUploadService
{
    public static function fileUpload($file, $path)
    {
        $fileName = null;
        if($file)
        {
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs($path, $fileName);
        }
        return $fileName;
    }
}