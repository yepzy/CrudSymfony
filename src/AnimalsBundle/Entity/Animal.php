<?php

namespace AnimalsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;    
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Animal
 *
 * @ORM\Table(name="animal")
 * @ORM\Entity(repositoryClass="AnimalsBundle\Repository\AnimalRepository")
 */
class Animal
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
     * @Assert\Regex(
     *     pattern="/[^a-zA-Z^\s]/",
     *     match=false,
     *     message="Your name cannot contain a number"
     * )
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;

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
   * @ORM\OneToOne(targetEntity="AnimalsBundle\Entity\Reptile", cascade={"persist"})
   */
    private $reptile;

    /**
   * @ORM\OneToOne(targetEntity="AnimalsBundle\Entity\Oiseau", cascade={"persist"})
   */
    private $oiseau;

    /**
   * @ORM\OneToOne(targetEntity="AnimalsBundle\Entity\Mammifere", cascade={"persist"})
   */
    private $mammifere;

    /**
     * Set reptile
     */
    public function setReptile($reptile)
    {
        $this->reptile = $reptile;

        return $this;
    }

    /**
     * Get reptile
     */
    public function getReptile()
    {
        return $this->reptile;
    }

    /**
     * Set oiseau
     */
    public function setOiseau($oiseau)
    {
        $this->oiseau = $oiseau;

        return $this;
    }

    /**
     * Get oiseau
     */
    public function getOiseau()
    {
        return $this->oiseau;
    }

    /**
     * Set mammifere
     */
    public function setMammifere($mammifere)
    {
        $this->mammifere = $mammifere;

        return $this;
    }

    /**
     * Get mammifere
     */
    public function getMammifere()
    {
        return $this->mammifere;
    }
}
