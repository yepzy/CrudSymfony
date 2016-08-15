<?php

namespace AnimalsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Reptile
 *
 * @ORM\Table(name="reptile")
 * @ORM\Entity(repositoryClass="AnimalsBundle\Repository\ReptileRepository")
 */
class Reptile
{
     /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
/**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="scale", type="string", length=255)
     * @Assert\Regex(
     *     pattern="/[^a-zA-Z^\s]/",
     *     match=false,
     *     message="Your scale color cannot contain a number"
     * )
     */
    private $scale;

    /**
     * Set scale
     *
     * @param string $scale
     * @return Animal
     */
    public function setScale($scale)
    {
        $this->scale = $scale;

        return $this;
    }

    /**
     * Get scale
     *
     * @return string 
     */
    public function getScale()
    {
        return $this->scale;
    }


    // Voir pour ajout auto ou non du e
    public function hiss($name){
        return 'I am a(n) '.$name.' and my scale is '.$this->scale.'!';
    }
}
