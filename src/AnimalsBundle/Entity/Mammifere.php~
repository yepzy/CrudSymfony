<?php

namespace AnimalsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Oiseau
 *
 * @ORM\Table(name="mammifere")
 * @ORM\Entity(repositoryClass="AnimalsBundle\Repository\MammifereRepository")
 */
class Mammifere extends Animal
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
     * @ORM\Column(name="fur", type="string", length=255)
     */
    private $fur;

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
     * Set fur
     *
     * @param string $fur
     * @return Animal
     */
    public function setfur($fur)
    {
        $this->fur = $fur;

        return $this;
    }

    /**
     * Get fur
     *
     * @return string 
     */
    public function getfur()
    {
        return $this->fur;
    }

    // Voir pour ajout auto ou non du e
    public function growl(){
        return 'je suis un(e) '.getName().'!';
    }
}
