<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AcceptedWoof
 *
 * @ORM\Table(name="accepted_woof")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AcceptedWoofRepository")
 */
class AcceptedWoof
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
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     */
    protected $acceptedUser;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="acceptedWoof")
     */
    protected $currentUser;
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Mail", mappedBy="acceptedWoof")
     * @ORM\JoinColumn(nullable=true)
     */
    protected $mail;
    
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
     * Set mail
     *
     * @param string $mail
     *
     * @return AcceptedWoof
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set acceptedUser
     *
     * @param \UserBundle\Entity\User $acceptedUser
     *
     * @return AcceptedWoof
     */
    public function setAcceptedUser(\UserBundle\Entity\User $acceptedUser)
    {
        $this->acceptedUser = $acceptedUser;

        return $this;
    }

    /**
     * Get acceptedUser
     *
     * @return \UserBundle\Entity\User
     */
    public function getAcceptedUser()
    {
        return $this->acceptedUser;
    }

    /**
     * Set currentUser
     *
     * @param \UserBundle\Entity\User $currentUser
     *
     * @return AcceptedWoof
     */
    public function setCurrentUser(\UserBundle\Entity\User $currentUser)
    {
        $this->currentUser = $currentUser;

        return $this;
    }

    /**
     * Get currentUser
     *
     * @return \UserBundle\Entity\User
     */
    public function getCurrentUser()
    {
        return $this->currentUser;
    }
}
