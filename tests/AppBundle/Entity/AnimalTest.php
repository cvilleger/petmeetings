<?php

namespace Tests\AppBundle\Entity;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Validator\Validation;
use AppBundle\Entity\Animal;

class AnimalTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $manager;
    private $validator;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        self::bootKernel();

        $this->manager = self::$kernel->getContainer()->get('doctrine.orm.entity_manager');
        $this->validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();
    }

    public function testAnimalMinAttributes()
    {
        $animalTest = new Animal();
        $animalTest->setName('Haru');
        $animalTest->setKind('chat');

        $errors = $this->validator->validate($animalTest);
        $this->assertEquals(0, count($errors), $errors);

        $this->manager->persist($animalTest);
        $this->manager->flush();
    }

    public function testAnimalNull()
    {
        $animalTest = new Animal();

        $errors = $this->validator->validate($animalTest);
        $this->assertEquals(0, count($errors), $errors);

        $this->manager->persist($animalTest);
        $this->manager->flush();
    }

    public function testAnimalWithWrongName()
    {
        $animalTest = new Animal();
        $animalTest->setName('Hu');
        $animalTest->setKind('chat');

        $errors = $this->validator->validate($animalTest);
        $this->assertEquals(0, count($errors), $errors);

        $this->manager->persist($animalTest);
        $this->manager->flush();
    }

    public function testAnimalWithWrongChoice()
    {
        $animalTest = new Animal();
        $animalTest->setName('Haru');
        $animalTest->setKind('chat');
        $animalTest->setGender('girl');

        $errors = $this->validator->validate($animalTest);
        $this->assertEquals(0, count($errors), $errors);

        $this->manager->persist($animalTest);
        $this->manager->flush();
    }

    public function testAnimalWithAge()
    {
        $animalTest = new Animal();
        $animalTest->setName('Haru');
        $animalTest->setKind('chat');
        $animalTest->setAge('un');

        $errors = $this->validator->validate($animalTest);
        $this->assertEquals(0, count($errors), $errors);

        $this->manager->persist($animalTest);
        $this->manager->flush();
    }

    public function testAnimalWithAge2()
    {
        $animalTest = new Animal();
        $animalTest->setName('Haru');
        $animalTest->setKind('chat');
        $animalTest->setAge(36);

        $errors = $this->validator->validate($animalTest);
        $this->assertEquals(0, count($errors), $errors);

        $this->manager->persist($animalTest);
        $this->manager->flush();
    }
}
