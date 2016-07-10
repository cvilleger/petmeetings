<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mail
 *
 * @ORM\Table(name="mail")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MailRepository")
 */
class Mail
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
     * @ORM\Column(name="text", type="text")
     */
    private $text;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\AcceptedWoof", inversedBy="mail")
     */
    protected $acceptedWoof;

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
     * Set text
     *
     * @param string $text
     *
     * @return Mail
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->acceptedWoof = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get acceptedWoof
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAcceptedWoof()
    {
        return $this->acceptedWoof;
    }

    /**
     * Set acceptedWoof
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function setAcceptedWoof(\AppBundle\Entity\AcceptedWoof $acceptedWoof)
    {
        $this->acceptedWoof = $acceptedWoof;

        return $this;
    }
}
