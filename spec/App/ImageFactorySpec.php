<?php

namespace spec\App;

use App\ImageFactory;
use App\Image;
use App\DefaultImage;
use App\Base64Image;
use App\UrlImage;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ImageFactorySpec extends ObjectBehavior
{
    function it_creates_image()
    {
        $data = [];
        $this->create($data)->shouldImplement(Image::class);
    }

    function it_creates_default_image_when_no_data_provided()
    {
        $data = [];
        $expectedImage = new DefaultImage();
        $this->create($data)->shouldBeLike(
            $expectedImage
        );
    }

    function it_creates_base_64_image_if_data_exists()
    {
        $data = [
            'base64' => 'abc'
        ];

        $expectedImage = new Base64Image('abc');

        $this->create($data)->shouldBeLike(
            $expectedImage
        );
    }

    function it_creates_url_image_if_data_exists()
    {
        $url = 'https://www.google.pl/imgres?imgurl=https%3A%2F%2Fwww.seetherainbow.com%2Frainbow-google.png&imgrefurl=https%3A%2F%2Fwww.seetherainbow.com%2F&docid=iBvHV5kGj81YhM&tbnid=qxWrTu-JepCUQM%3A&vet=10ahUKEwjeutST4ezlAhVH06YKHYTUBVYQMwhBKAAwAA..i&w=378&h=183&client=opera&bih=832&biw=1440&q=google%20rainbow&ved=0ahUKEwjeutST4ezlAhVH06YKHYTUBVYQMwhBKAAwAA&iact=mrc&uact=8';
        $data = [
            'url' => $url
        ];

        $expectedImage = new UrlImage($url);

        $this->create($data)->shouldBeLike(
            $expectedImage
        );
    }



    function it_prefers_base64_image_over_url_image()
    {
        $data = [
            'base64' => 'abc',
            'url' => 'def'
        ];

        $expectedImage = new Base64Image('abc');

        $this->create($data)->shouldBeLike(
            $expectedImage
        );
    }
}
