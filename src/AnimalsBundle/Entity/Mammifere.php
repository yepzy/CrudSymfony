<?php

namespace AnimalsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Oiseau
 *
 * @ORM\Table(name="mammifere")
 * @ORM\Entity(repositoryClass="AnimalsBundle\Repository\MammifereRepository")
 */
class Mammifere
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
     * @ORM\Column(name="fur", type="string", length=255)
     */
    private $fur;
    /**
     * Set fur
     *
     * @param string $fur
     * @return Animal
     */
    public function setFur($fur)
    {
        $this->fur = $fur;

        return $this;
    }

    /**
     * Get fur
     *
     * @return string 
     */
    public function getFur()
    {
        return $this->fur;
    }

    // Voir pour ajout auto ou non du e
    public function growl($name){
        return 'I am a(n) '.$name.' and my fur is '.$this->fur.'!';
    }
}
