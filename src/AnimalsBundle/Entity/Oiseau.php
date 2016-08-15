<?php

namespace AnimalsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
<<<<<<< HEAD
use Symfony\Component\Validator\Constraints as Assert;
=======
>>>>>>> 355bf4e995d78c6fb46dae8c470bad131f14a8cc

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
<<<<<<< HEAD
     * @Assert\Regex(
     *     pattern="/[^a-zA-Z^\s]/",
     *     match=false,
     *     message="Your feather color cannot contain a number"
     * )
=======
>>>>>>> 355bf4e995d78c6fb46dae8c470bad131f14a8cc
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
