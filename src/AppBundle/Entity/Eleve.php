<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * eleve
 *
 * @ORM\Table(name="eleve")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EleveRepository")
 */
class Eleve
{
    const MALE = 'homme';
    const FEMALE = 'femme';

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
     */
    private $firstname;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $lastname;

    /**
     * @var Ecole
     * @ORM\ManyToOne(targetEntity="Ecole", inversedBy="eleves")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ecole;

    public function __construct()
    {

    }

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
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return eleve
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return eleve
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }


    /**
     * @return Ecole
     */
    public function getEcole()
    {
        return $this->ecole;
    }

    /**
     * @param Ecole $ecole
     */
    public function setEcole($ecole)
    {
        $this->ecole = $ecole;
    }


}

