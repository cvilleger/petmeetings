<?php
namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use UserBundle\Entity\User;
use UserBundle\Entity\Animal;

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
		$biography = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim Pate patate patate patate patate patate patate patate patate patate patate patate patate patate patate patate patate dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

// GROUPE 1

		$animalTest = new Animal();
		$animalTest->setName('Haru');
		$animalTest->setAge(2);
		$animalTest->setGender('Femelle');
		$animalTest->setKind('chat');
		$animalTest->setRace('europeen');
		$animalTest->setBehavior('sociable');
		$animalTest->setBiography('chat tres joueur et assez gourmand');

		$manager->persist($animalTest);

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
		$user->setGender('Homme');
		$user->setOrientation('hétéro');
		$user->setMeetingtype('amoureuse');
		$user->setStartsub(new \DateTime(date('Y-m-01 00:00:00')));
		$user->setEndsub(new \DateTime(date('Y-m-01 00:00:00',strtotime('+3 month'))));
		$user->setWoofs(5);
		$user->setWoofsleft(1);
		$password = $encoder->encodePassword($user, 'admin');
		$user->setPassword($password);
		$user->setAnimal($animalTest);
		$userManager->updateUser($user);

// GROUPE 2
		$animalTest = new Animal();
		$animalTest->setName('Myrta');
		$animalTest->setAge(2);
		$animalTest->setGender('Femelle');
		$animalTest->setKind('chat');
		$animalTest->setRace('europeen');
		$animalTest->setBehavior('sociable');
		$animalTest->setBiography('chat tres joueur et assez gourmand');

		$manager->persist($animalTest);

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
		$user->setGender('Homme');
		$user->setOrientation('Hétérosexuel');
		$user->setMeetingtype('Amoureuse');
		$user->setGender('masculin');
		$user->setOrientation('hétéro');
		$user->setMeetingtype('amoureuse');
		$user->setStartsub(new \DateTime(date('Y-m-01 00:00:00')));
		$user->setEndsub(new \DateTime(date('Y-m-01 00:00:00',strtotime('+3 month'))));
		$user->setWoofs(5);
		$user->setWoofsleft(1);
		$password = $encoder->encodePassword($user, 'password');
		$user->setPassword($password);
		$user->setAnimal($animalTest);

		$userManager->updateUser($user);


// GROUPE 3
		$animalTest = new Animal();
		$animalTest->setName('Melissa');
		$animalTest->setAge(2);
		$animalTest->setGender('Femelle');
		$animalTest->setKind('chat');
		$animalTest->setRace('europeen');
		$animalTest->setBehavior('sociable');
		$animalTest->setBiography('chat tres joueur et assez gourmand');

		$manager->persist($animalTest);

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
		$user->setGender('Femme');
		$user->setOrientation('bi');
		$user->setMeetingtype('amicale');
		$user->setStartsub(new \DateTime(date('Y-m-01 00:00:00')));
		$user->setEndsub(new \DateTime(date('Y-m-01 00:00:00',strtotime('+3 month'))));
		$user->setWoofs(5);
		$user->setWoofsleft(1);
		$password = $encoder->encodePassword($user, 'password');
		$user->setPassword($password);
		$user->setAnimal($animalTest);

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
