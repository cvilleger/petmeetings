<?php
namespace UserBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Majeur extends Constraint
{
    public $message = 'Vous devez avoir au moins 18 ans pour pouvoir vous inscrire';
}