<?php
namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use UserBundle\Entity\User;
class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface{
    /**
     * @var ContainerInterface
     */
    private $container;
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager){
        /**
         * Admin:
         * Admin/admin
         *
         * User1: masculin, hétéro, amoureuse, premium
         * John42/password
         *
         * User2: féminin, bi, amicale, premium
         * Sofia75/password
         */
        $userManager = $this->container->get('fos_user.user_manager');
        $encoder = $this->container->get('security.password_encoder');
        $biography = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
        /** @var User $user */
        $user = $userManager->createUser();
        $user->setRoles(array('ROLE_ADMIN'));
        $user->setEnabled(true);
        $user->setFirstname('Lord');
        $user->setLastname('Commander');
        $user->setUsername('Admin');
        $user->setEmail('admin@admin.com');
        $user->setCity('Paris');
        $user->setBirthday(new \DateTime('1990-09-18 00:00:00'));
        $user->setBiography($biography);
        $user->setSize(180);
        $user->setWeight(80);
        $user->setGender('masculin');
        $user->setOrientation('hétéro');
        $user->setMeetingtype('amoureuse');
        $user->setStartsub(new \DateTime(date('Y-m-01 00:00:00')));
        $user->setEndsub(new \DateTime(date('Y-m-01 00:00:00',strtotime('+3 month'))));
        $user->setLikes(5);
        $user->setLikesleft(1);
        $password = $encoder->encodePassword($user, 'admin');
        $user->setPassword($password);
        $userManager->updateUser($user);
        /** @var User $user */
        $user = $userManager->createUser();
        $user->setRoles(array('ROLE_USER'));
        $user->setEnabled(true);
        $user->setFirstname('John');
        $user->setLastname('Doe');
        $user->setUsername('John42');
        $user->setEmail('john.doe@gmail.com');
        $user->setCity('Paris');
        $user->setBirthday(new \DateTime('1990-09-18 00:00:00'));
        $user->setBiography($biography);
        $user->setSize(180);
        $user->setWeight(80);
        $user->setGender('masculin');
        $user->setOrientation('hétéro');
        $user->setMeetingtype('amoureuse');
        $user->setStartsub(new \DateTime(date('Y-m-01 00:00:00')));
        $user->setEndsub(new \DateTime(date('Y-m-01 00:00:00',strtotime('+3 month'))));
        $user->setLikes(5);
        $user->setLikesleft(1);
        $password = $encoder->encodePassword($user, 'password');
        $user->setPassword($password);
        $userManager->updateUser($user);
        /** @var User $user */
        $user = $userManager->createUser();
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_USER'));
        $user->setFirstname('Sofia');
        $user->setLastname('Dupont');
        $user->setUsername('Sofia75');
        $user->setEmail('sofia.dupont@gmail.com');
        $user->setCity('Paris');
        $user->setBirthday(new \DateTime('1992-04-01 00:00:00'));
        $user->setBiography($biography);
        $user->setSize(180);
        $user->setWeight(80);
        $user->setGender('féminin');
        $user->setOrientation('bi');
        $user->setMeetingtype('amicale');
        $user->setStartsub(new \DateTime(date('Y-m-01 00:00:00')));
        $user->setEndsub(new \DateTime(date('Y-m-01 00:00:00',strtotime('+3 month'))));
        $user->setLikes(5);
        $user->setLikesleft(1);
        $password = $encoder->encodePassword($user, 'password');
        $user->setPassword($password);
        $userManager->updateUser($user);
    }
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    public function getOrder(){
        return 1;
    }
}
