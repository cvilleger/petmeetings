<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Animal
 *
 * @ORM\Table(name="animal")
 * @ORM\Entity()
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
     * @Assert\Length(min = 3, minMessage = "The name of your animal must contain at least 3 characters")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="canonicalName", type="string", length=255)
     * @Assert\Length(min = 3, minMessage = "The name of your animal must contain at least 3 characters")
     */
    private $canonicalName;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=255, nullable=true)
     */
    private $gender;

    /**
     * @var float
     *
     * @ORM\Column(name="age", type="decimal", precision=3, scale=1, nullable=true)
     *
     * @Assert\Type(
     *     type = "integer",
     *     message = "La donnée attendue n'est pas valide."
     * )
     * @Assert\Range(min=0, max=20, minMessage = "Your animal must be at least {{ limit }}", maxMessage = "Your animal cannot be more old than {{ limit }}")
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="kind", type="string", length=255)
     * @Assert\NotBlank(message="You must specified a kind for your animal")
     */
    private $kind;

    /**
     * @var string
     *
     * @ORM\Column(name="race", type="string", length=255, nullable=true)
     */
    private $race;

    /**
     * @var string
     *
     * @ORM\Column(name="behavior", type="string", length=255, nullable=true)
     */
    private $behavior;

    /**
     * @var string
     *
     * @ORM\Column(name="biography", type="text", nullable=true)
     */
    private $biography;

    /**
     * @var string
     *
     * @ORM\Column(name="pictureName", type="string", length=255, nullable=true)
     */
    private $pictureName;
    public $picture;

    function __construct() {
        $this->canonicalName = strtolower($this->name);
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
     * Set name
     *
     * @param string $name
     *
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
     * Set gender
     *
     * @param string $gender
     *
     * @return Animal
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return Animal
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set kind
     *
     * @param string $kind
     *
     * @return Animal
     */
    public function setKind($kind)
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * Get kind
     *
     * @return string
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * Set race
     *
     * @param string $race
     *
     * @return Animal
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get race
     *
     * @return string
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set behavior
     *
     * @param string $behavior
     *
     * @return Animal
     */
    public function setBehavior($behavior)
    {
        $this->behavior = $behavior;

        return $this;
    }

    /**
     * Get behavior
     *
     * @return string
     */
    public function getBehavior()
    {
        return $this->behavior;
    }

    /**
     * Set biography
     *
     * @param string $biography
     *
     * @return Animal
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * Get biography
     *
     * @return string
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * Set pictureName
     *
     * @param string $pictureName
     *
     * @return Animal
     */
    public function setPictureName($pictureName)
    {
        $this->pictureName = $pictureName;

        return $this;
    }

    /**
     * Get pictureName
     *
     * @return string
     */
    public function getPictureName()
    {
        return $this->pictureName;
    }

    /**
     * Set canonicalName
     *
     * @param string $canonicalName
     *
     * @return Animal
     */
    public function setCanonicalName($canonicalName)
    {
        $this->canonicalName = $canonicalName;

        return $this;
    }

    /**
     * Get canonicalName
     *
     * @return string
     */
    public function getCanonicalName()
    {
        return $this->canonicalName;
    }
}
