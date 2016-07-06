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
}