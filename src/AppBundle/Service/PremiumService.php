<?php
namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;
use UserBundle\Entity\User;

class PremiumService{
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
     * Returns all users sorted by ASC username
     * @return User array
     */
    public function getUsers(){
        return $this->userRepository->findBy(
            array(),
            array('username' => 'ASC')
        );
    }

    /**
     * Change status
     * @param User $user
     */
    public function changeStatus(User $user, $status){
        $user->setStatus($status);
        $this->em->persist($user);
        $this->em->flush();
    }

    /**
     * Obtain new woof
     * @param User $user
     */
    public function receiveWoof(User $user){
        if($user->getStatus() == 'boostedLover') {
            $user->setWoofsLeft($user->getWoofsleft()+5);
        }
        else {
            $user->setWoofsLeft($user->getWoofsleft()+1);
        }
        $this->em->persist($user);
        $this->em->flush();
    }

    /**
     * Give a woof to another user
     * @param User $user
     */
    public function giveWoof(User $sender, User $collecter){
        // Sender gives a woof
        $sender->setWoofsLeft($sender->getWoofsleft()-1);
        // Collecter obtain a woof who awaiting for a response so we register sender's name
        $collecter->setWoofs($collecter->getWoofs()+1);
        $collecter->addAwaitingWoof($collecter->getUsername());
        
        $this->em->persist($sender);
        $this->em->persist($collecter);
        $this->em->flush();
    }
}