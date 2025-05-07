<?php

namespace App\Helpers;

use ImageKit\ImageKit;

class ImageKitHelper
{
    public static function uploadImage($file, $folder = 'default')
    {
        if (!$file) return null;

        $imageKit = new ImageKit(
            publicKey: env('IMAGEKIT_PUBLIC_KEY'),
            privateKey: env('IMAGEKIT_PRIVATE_KEY'),
            urlEndpoint: env('IMAGEKIT_URL_ENDPOINT')
        );

        $fileData = [
            "file" => base64_encode(file_get_contents($file->getRealPath())),
            "fileName" => uniqid() . '.' . $file->getClientOriginalExtension(),
            "folder" => $folder,
        ];

        $upload = $imageKit->upload($fileData);

        if (isset($upload->result->url)) {
            return $upload->result->url;
        }

        return null;
    }
}
