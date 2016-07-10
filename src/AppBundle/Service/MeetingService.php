<?php
namespace AppBundle\Service;

use AppBundle\Entity\AcceptedWoof;
use Doctrine\ORM\EntityManager;
use UserBundle\Entity\User;

class MeetingService{
	/**
	 * @var EntityManager
	 */
	protected $em;
	/**
	 * @var \Doctrine\ORM\EntityRepository
	 */
	protected $userRepository;

	/**
	 * @param EntityManager $entityManager
	 */
	function __construct(EntityManager $entityManager){
		$this->em = $entityManager;
		$this->userRepository = $this->em->getRepository('UserBundle:User');
	}

	/**
	 * Give a woof to another user
	 * @param User $user
	 */
	public function giveWoof(User $sender, User $collecter){
		// Sender gives a woof
		$sender->setWoofsLeft($sender->getWoofsLeft()-1);
		// Collecter obtain a woof who awaiting for a response so we register sender's name
		$collecter->setWoofs($collecter->getWoofs()+1);
		$collecter->addAwaitingWoof($sender);

		$this->em->persist($sender);
		$this->em->persist($collecter);
		$this->em->flush();
	}
    
    public function answerWoof(User $sender, User $collecter, $answer){
        $collecter->removeAwaitingWoof($sender);
        if($answer == 'yes') {
            $acceptedWoof = new AcceptedWoof();
            $acceptedWoof->setAcceptedUser($sender);
            $acceptedWoof->setCurrentUser($collecter);
            $collecter->addAcceptedWoof($acceptedWoof);
            $this->em->persist($acceptedWoof);
        }
        
        $this->em->persist($collecter);
        $this->em->flush();
    }

    /**
     * Sending mail to an acceptedUser
     * @param AcceptedWoof $acceptedWoof
     */
    public function saveMail(AcceptedWoof $acceptedWoof, $mail){
        $mail->setAcceptedWoof($acceptedWoof);
        $this->em->persist($mail);
        $this->em->flush();
    }
}