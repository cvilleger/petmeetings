<?php
namespace UserBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class MajeurValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        $now = new \DateTime();
        $age = $now->diff($value);
        if($age->y < 18)
        {
            $this->context->addViolation($constraint->message);

        }
    }
}