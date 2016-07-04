<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AdvancedSearchWeightType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('minWeight', IntegerType::class, array(
                'label' => 'form.search.weight',
                'translation_domain' => 'AppBundle',
                'required' => false
            ))
            ->add('maxWeight', IntegerType::class, array(
                'label' => 'form.search.and',
                'translation_domain' => 'AppBundle',
                'required' => false
            ))
        ;
    }

    public function getName()
    {
        return 'AppBundle_advanced_search_weight';
    }
}