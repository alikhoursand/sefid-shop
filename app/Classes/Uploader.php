<?php

namespace App\Classes;

use Illuminate\Support\Facades\Storage;

class Uploader
{
    public function uploadImage($file, $type, $current_image = null)
    {
        $path = $file->store($type, "public");

        if ($path && $current_image != null) {
            $this->deletePrevious($current_image);
        }

        return $path;
    }


    public function deletePrevious($image): void
    {
        Storage::disk("public")->delete($image);
    }
}
