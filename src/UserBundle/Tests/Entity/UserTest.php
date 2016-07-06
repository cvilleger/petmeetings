<?php

namespace UserBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Validator\Validation;
use UserBundle\Entity\User;

class UserTest extends KernelTestCase{

    protected $manager;

    protected  $validator;

    protected function setUp()
    {
        self::bootKernel();

        //$this->manager = self::$kernel->getContainer()->get('doctrine.orm.entity_manager');

        $this->validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();
    }

    /**
     * Test if firstname is not empty
     */
    public function testUserWithEmptyFirstname(){
        $user = new User();
        $user->setFirstname('');

        $errors = $this->validator->validate($user);

        $this->assertNotEquals(count($errors), 0);
    }

    /**
     * Test if firstname has the right type
     */
    public function testUserWithWrongTypeFirstname(){
        $user = new User();
        $user->setFirstname(123456);

        $errors = $this->validator->validate($user);

        $this->assertNotEquals(count($errors), 0);
    }
}
