<?php

namespace AppBundle\Images;


use AppBundle\Entity\Ecole;
use claviska\SimpleImage;

class ImageManipulator
{
    /**
     * @var SimpleImage
     */
    private $simpleImage;

    private $uploadPath;

    public function __construct(SimpleImage $simpleImage, $uploadPath)
    {
        $this->simpleImage = $simpleImage;
        $this->uploadPath = $uploadPath;
    }


    /**
     * Upload and resize of ecole picture
     * @param Ecole $ecole
     */
    public function handleUploadedEcolePicture(Ecole $ecole)
    {
        if (!$picture = $ecole->getPicture()) {
            return;
        }

        $name = uniqid().'.jpg';

        $this->simpleImage
            ->fromFile($picture->getRealPath())
            ->bestFit(Ecole::MAX_PICTURE_WIDTH, Ecole::MAX_PICTURE_HEIGHT)
            ->toFile($this->uploadPath.$name);

        $ecole->setPicture('images/'.$name);
    }

}




