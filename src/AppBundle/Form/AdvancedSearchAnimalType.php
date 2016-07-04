<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AdvancedSearchAnimalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('kind', ChoiceType::class, array(
                'choices' => array(
                    'choice.animal.kind.1' => 'choice.animal.kind.1',
                    'choice.animal.kind.2' => 'choice.animal.kind.2'
                ),
                'expanded' => true,
                'multiple' => true,
                'label' => 'form.search.animal.kind',
                'translation_domain' => 'AppBundle'
            ))
            ->add('race', TextType::class, array(
                'label' => 'form.search.animal.race',
                'translation_domain' => 'AppBundle',
                'required' => false
            ))
            ->add('age', IntegerType::class, array(
                'label' => 'form.search.animal.age',
                'translation_domain' => 'AppBundle',
                'required' => false
            ))
            ->add('gender', ChoiceType::class, array(
                'choices' => array(
                    'choice.animal.gender.1' => 'choice.animal.gender.1',
                    'choice.animal.gender.2' => 'choice.animal.gender.2'
                ),
                'expanded' => true,
                'multiple' => true,
                'label' => 'form.search.animal.gender',
                'translation_domain' => 'AppBundle',
                'required' => false
            ))
        ;
    }

    public function getName()
    {
        return 'AppBundle_advanced_search';
    }
}