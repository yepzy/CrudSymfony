<?php

namespace AnimalsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reptile
 *
 * @ORM\Table(name="reptile")
 * @ORM\Entity(repositoryClass="AnimalsBundle\Repository\ReptileRepository")
 */
class Reptile extends Animal
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="scale", type="string", length=255)
     */
    private $scale;

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
     * Set name
     *
     * @param string $name
     * @return Animal
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return Animal
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set scale
     *
     * @param string $scale
     * @return Animal
     */
    public function setscale($scale)
    {
        $this->scale = $scale;

        return $this;
    }

    /**
     * Get scale
     *
     * @return string 
     */
    public function getscale()
    {
        return $this->scale;
    }


    // Voir pour ajout auto ou non du e
    public function hiss(){
        return 'je suis un(e) '.getName().'!';
    }
}
