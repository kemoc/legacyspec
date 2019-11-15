<?php

namespace App;

class ImageFactory
{
    public function create($data)
    {
        if (array_key_exists('base64', $data)) {
            return new Base64Image($data['base64']);
        } elseif (array_key_exists('url', $data)) {
            return new UrlImage($data['url']);
        }
        return new DefaultImage();
    }
}
