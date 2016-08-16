<?php

namespace AnimalsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
<<<<<<< HEAD
use Symfony\Component\Validator\Constraints as Assert;
=======
<<<<<<< HEAD
use Symfony\Component\Validator\Constraints as Assert;
=======
>>>>>>> 355bf4e995d78c6fb46dae8c470bad131f14a8cc
>>>>>>> a5b12d48dc05092d134ba387ccb20b5a8fd321ae

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
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> a5b12d48dc05092d134ba387ccb20b5a8fd321ae
     * @Assert\Regex(
     *     pattern="/[^a-zA-Z^\s]/",
     *     match=false,
     *     message="Your fur color cannot contain a number"
     * )
<<<<<<< HEAD
=======
=======
>>>>>>> 355bf4e995d78c6fb46dae8c470bad131f14a8cc
>>>>>>> a5b12d48dc05092d134ba387ccb20b5a8fd321ae
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
