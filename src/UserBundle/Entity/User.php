<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
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
     * @ORM\Column(name="firstname", type="string", length=20)
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
     * @ORM\Column(name="lastname", type="string", length=20)
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
     * @ORM\Column(name="city", type="string", length=20)
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
     * @var date
     *
     * @ORM\Column(name="birthday", type="date")
     *
     * @Assert\Type(
     *     type = "datetime",
     *     message = "La donnée attendue n'est pas valide."
     * )
     */
    protected $birthday;

    /**
     * @var text
     *
     * @ORM\Column(name="biography", type="text")
     *
     * @Assert\Length(
     *     max = 400,
     *     maxMessage = "Votre biographie ne peut pas dépasser {{limit}} caractères."
     * )
     */
    protected $biography;

    /**
     * @var integer
     *
     * @ORM\Column(name="size", type="integer")
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
     * @ORM\Column(name="weight", type="integer")
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
     * @ORM\Column(name="gender", type="string")
     *
     * @Assert\Type(
     *     type = "string",
     *     message = "La donnée attendue n'est pas valide."
     * )
     * @Assert\NotBlank(
     *     message = "Cette donnée ne peut être vide."
     * )
     * @Assert\Choice(
     *     choices = {"masculin", "féminin", "autre"},
     *     message = "Votre genre n'est pas valide."
     * )
     */
    protected $gender;

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
     * @param \textarea $biography
     *
     * @return User
     */
    public function setBiography(\textarea $biography)
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * Get biography
     *
     * @return \textarea
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
}
