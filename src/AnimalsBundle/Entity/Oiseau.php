<?php

namespace AnimalsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Oiseau
 *
 * @ORM\Table(name="oiseau")
 * @ORM\Entity(repositoryClass="AnimalsBundle\Repository\OiseauRepository")
 */
class Oiseau
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
     * @ORM\Column(name="feather", type="string", length=255)
     */
    private $feather;

    /**
     * Set feather
     *
     * @param string $feather
     * @return Animal
     */
    public function setFeather($feather)
    {
        $this->feather = $feather;

        return $this;
    }

    /**
     * Get feather
     *
     * @return string 
     */
    public function getFeather()
    {
        return $this->feather;
    }

    // Voir pour ajout auto ou non du e
    public function tweet($name){
        return 'I am a(n) '.$name.' and my feathers are '.$this->feather.'!';
    }
}
