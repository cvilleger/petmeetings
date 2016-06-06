<?php

namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use UserBundle\Entity\Animal;

class LoadAnimalData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $animalTest = new Animal();
        $animalTest->setName('Haru');
        $animalTest->setAge(2);
        $animalTest->setGender('female');
        $animalTest->setKind('chat');
        $animalTest->setRace('europeen');
        $animalTest->setBehavior('sociable');
        $animalTest->setBiography('chat tres joueur et assez gourmand');

        $manager->persist($animalTest);
        $manager->flush();
    }
}