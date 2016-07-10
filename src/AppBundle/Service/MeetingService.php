<?php
namespace AppBundle\Service;

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

	/**
	 * Answer a woof sending by another user
	 * @param User $user
	 */
	public function answerWoof(User $sender, User $collecter){
		$collecter->removeAwaitingWoof($sender);

		$this->em->persist($collecter);
		$this->em->flush();
	}
}