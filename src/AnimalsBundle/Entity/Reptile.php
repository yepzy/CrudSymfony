<?php

namespace AnimalsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


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
