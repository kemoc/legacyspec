<?php
/**
 * Created by PhpStorm.
 * User: daryush
 * Date: 2019-11-15
 * Time: 18:34
 */

namespace App;


class Base64Image implements Image
{
    /**
     * @var string
     */
    private $base64;


    /**
     * Base64Image constructor.
     */
    public function __construct(string $base64)
    {
        $this->base64 = base64_decode($base64);
    }

    public function getImageContent()
    {
        return $this->base64;
    }
}
