<?php

namespace UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use UserBundle\Validator as UserAssert;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="UserBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=20, nullable=true)
     *
     * @Assert\Type(
     *     type = "string",
     *     message = "La donnée attendue n'est pas valide."
     * )
     */
    protected $status;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=20, nullable=true)
     *
     * @Assert\Type(
     *     type = "string",
     *     message = "La donnée attendue n'est pas valide."
     * )
     * @Assert\Length(
     *     min = 1,
     *     max = 20,
     *     minMessage = "Votre prénom doit contenir au moins {{limit}} caractère.",
     *     maxMessage = "Votre prénom ne peut pas dépasser {{limit}} caractères."
     * )
     */
    protected $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=20, nullable=true)
     *
     * @Assert\Type(
     *     type = "string",
     *     message = "La donnée attendue n'est pas valide."
     * )
     * @Assert\Length(
     *     min = 1,
     *     max = 20,
     *     minMessage = "Votre nom doit contenir au moins {{limit}} caractère.",
     *     maxMessage = "Votre nom ne peut pas dépasser {{limit}} caractères."
     * )
     */
    protected $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=20, nullable=true)
     *
     * @Assert\Type(
     *     type = "string",
     *     message = "La donnée attendue n'est pas valide."
     * )
     * @Assert\Length(
     *     min = 1,
     *     max = 20,
     *     minMessage = "Votre ville doit contenir au moins {{limit}} caractère.",
     *     maxMessage = "Votre ville ne peut pas dépasser {{limit}} caractères."
     * )
     */
    protected $city;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="datetime", nullable=true)
     *
     * @Assert\Type(
     *     type = "datetime",
     *     message = "La donnée attendue n'est pas valide."
     * )
     * @UserAssert\Majeur
     */
    protected $birthday;

    /**
     * @var string
     *
     * @ORM\Column(name="biography", type="text", nullable=true)
     *
     * @Assert\Length(
     *     max = 500,
     *     maxMessage = "Votre biographie ne peut pas dépasser {{limit}} caractères."
     * )
     */
    protected $biography;

    /**
     * @var integer
     *
     * @ORM\Column(name="size", type="integer", nullable=true)
     *
     * @Assert\Type(
     *     type = "integer",
     *     message = "La donnée attendue n'est pas valide."
     * )
     * @Assert\Range(
     *     min = 100,
     *     max = 230,
     *     minMessage = "Votre taille ne peut pas être inferieure à {{limit}} cm.",
     *     maxMessage = "Votre taille ne peut pas dépasser les {{limit}} cm."
     * )
     */
    protected $size;

    /**
     * @var integer
     *
     * @ORM\Column(name="weight", type="integer", nullable=true)
     *
     * @Assert\Type(
     *     type = "integer",
     *     message = "La donnée attendue n'est pas valide."
     * )
     * @Assert\Range(
     *     min = 40,
     *     max = 180,
     *     minMessage = "Votre poids ne peut pas être inferieure à {{limit}} kg.",
     *     maxMessage = "Votre poids ne peut pas dépasser les {{limit}} kg."
     * )
     */
    protected $weight;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", nullable=true)
     *
     * @Assert\Type(
     *     type = "string",
     *     message = "La donnée attendue n'est pas valide."
     * )
     */
    protected $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="orientation", type="string", nullable=true)
     *
     * @Assert\Type(
     *     type = "string",
     *     message = "La donnée attendue n'est pas valide."
     * )
     */
    protected $orientation;

    /**
     * @var string
     *
     * @ORM\Column(name="meetingtype", type="string", nullable=true)
     *
     * @Assert\Type(
     *     type = "string",
     *     message = "La donnée attendue n'est pas valide."
     * )
     */
    protected $meetingtype;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startsub", type="datetime", nullable=true)
     *
     * @Assert\Type(
     *     type = "datetime",
     *     message = "La donnée attendue n'est pas valide."
     * )
     */
    protected $startsub;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endsub", type="datetime", nullable=true)
     *
     * @Assert\Type(
     *     type = "datetime",
     *     message = "La donnée attendue n'est pas valide."
     * )
     */
    protected $endsub;
    /**
     * @ORM\ManyToMany(targetEntity="UserBundle\Entity\User")
     */
    protected $awaitingWoof;

    /**
     * @var integer
     *
     * @ORM\Column(name="woofs", type="integer", nullable=true)
     */
    protected $woofs;

    /**
     * @var integer
     *
     * @ORM\Column(name="woofsLeft", type="integer", nullable=true)
     */
    protected $woofsLeft;
    
    /**
     * @var string
     *
     * @ORM\Column(name="pictureName", type="string", length=255, nullable=true)
     */
    private $pictureName;
    public $picture;

    /**
     * @ORM\OneToOne(targetEntity="UserBundle\Entity\Animal", cascade={"persist"})
     */
    private $animal;

    public function __construct()
    {
        parent::__construct();
        $this->status = 'classic';
        $this->woofs =  0;
        $this->woofsLeft =  0;
    }

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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     *
     * @return User
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set biography
     *
     * @param String $biography
     *
     * @return User
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * Get biography
     *
     * @return String
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * Set size
     *
     * @param integer $size
     *
     * @return User
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return integer
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return User
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return User
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
     * Set orientation
     *
     * @param string $orientation
     *
     * @return User
     */
    public function setOrientation($orientation)
    {
        $this->orientation = $orientation;

        return $this;
    }

    /**
     * Get orientation
     *
     * @return string
     */
    public function getOrientation()
    {
        return $this->orientation;
    }

    /**
     * Set meetingtype
     *
     * @param string $meetingtype
     *
     * @return User
     */
    public function setMeetingtype($meetingtype)
    {
        $this->meetingtype = $meetingtype;

        return $this;
    }

    /**
     * Get meetingtype
     *
     * @return string
     */
    public function getMeetingtype()
    {
        return $this->meetingtype;
    }

    /**
     * Set startsub
     *
     * @param \DateTime $startsub
     *
     * @return User
     */
    public function setStartsub($startsub)
    {
        $this->startsub = $startsub;

        return $this;
    }

    /**
     * Get startsub
     *
     * @return \DateTime
     */
    public function getStartsub()
    {
        return $this->startsub;
    }

    /**
     * Set endsub
     *
     * @param \DateTime $endsub
     *
     * @return User
     */
    public function setEndsub($endsub)
    {
        $this->endsub = $endsub;

        return $this;
    }

    /**
     * Get endsub
     *
     * @return \DateTime
     */
    public function getEndsub()
    {
        return $this->endsub;
    }

    /**
     * Set animal
     *
     * @param \UserBundle\Entity\Animal $animal
     *
     * @return User
     */
    public function setAnimal(\UserBundle\Entity\Animal $animal = null)
    {
        $this->animal = $animal;

        return $this;
    }

    /**
     * Get animal
     *
     * @return \UserBundle\Entity\Animal
     */
    public function getAnimal()
    {
        return $this->animal;
    }

    /**
     * Set pictureName
     *
     * @param string $pictureName
     *
     * @return User
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
     * Set status
     *
     * @param string $status
     *
     * @return User
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set woofs
     *
     * @param integer $woofs
     *
     * @return User
     */
    public function setWoofs($woofs)
    {
        $this->woofs = $woofs;

        return $this;
    }

    /**
     * Get woofs
     *
     * @return integer
     */
    public function getWoofs()
    {
        return $this->woofs;
    }

    /**
     * Set woofsLeft
     *
     * @param integer $woofsLeft
     *
     * @return User
     */
    public function setWoofsLeft($woofsLeft)
    {
        $this->woofsLeft = $woofsLeft;

        return $this;
    }

    /**
     * Get woofsLeft
     *
     * @return integer
     */
    public function getWoofsLeft()
    {
        return $this->woofsLeft;
    }

    /**
     * Add awaitingWoof
     *
     * @param \UserBundle\Entity\User $awaitingWoof
     *
     * @return User
     */
    public function addAwaitingWoof(\UserBundle\Entity\User $awaitingWoof)
    {
        $this->awaitingWoof[] = $awaitingWoof;

        return $this;
    }

    /**
     * Remove awaitingWoof
     *
     * @param \UserBundle\Entity\User $awaitingWoof
     */
    public function removeAwaitingWoof(\UserBundle\Entity\User $awaitingWoof)
    {
        $this->awaitingWoof->removeElement($awaitingWoof);
    }

    /**
     * Get awaitingWoof
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAwaitingWoof()
    {
        return $this->awaitingWoof;
    }
}
