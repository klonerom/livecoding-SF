<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints;

/**
 * @ORM\Table(name="ecole")
 * @ORM\Entity()
 */
class Ecole
{
    // utile par exemple pour l'upload
    const MAX_PICTURE_WIDTH = 100;
    const MAX_PICTURE_HEIGHT = 100;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @Constraints\NotBlank(message="BIM")
     */
    private $city;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $region;

    /**
     * @ORM\OneToMany(targetEntity="Eleve", mappedBy="ecole")
     */
    private $eleves;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $picture;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Ecole
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param string $region
     * @return Ecole
     */
    public function setRegion($region)
    {
        $this->region = $region;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEleves()
    {
        return $this->eleves;
    }

    /**
     * @param mixed $eleves
     */
    public function setEleves($eleves)
    {
        $this->eleves = $eleves;
    }

    /**
     * @return string|UploadedFile
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param string|UploadedFile $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }
}

