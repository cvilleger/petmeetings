<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AdvancedSearchBetweenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('size', AdvancedSearchSizeType::class)
            ->add('weight', AdvancedSearchWeightType::class)
        ;
    }

    public function getName()
    {
        return 'AppBundle_advanced_search_between';
    }
}