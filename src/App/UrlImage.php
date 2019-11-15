<?php
/**
 * Created by PhpStorm.
 * User: daryush
 * Date: 2019-11-15
 * Time: 18:40
 */

namespace App;


class UrlImage implements Image
{
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function getImageContent()
    {
        return file_get_contents($this->url);
    }
}
