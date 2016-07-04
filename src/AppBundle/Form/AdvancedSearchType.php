<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AdvancedSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender', ChoiceType::class, array(
                'choices' => array(
                    'choice.user.gender.1' => 'choice.user.gender.1',
                    'choice.user.gender.2' => 'choice.user.gender.2'
                ),
                'multiple' => true,
                'expanded' => true,
                'label' => 'form.search.gender',
                'translation_domain' => 'AppBundle',
                'required' => false
            ))
            ->add('between', AdvancedSearchBetweenType::class)
            ->add('meetingtype', ChoiceType::class, array(
                'choices' => array(
                    'choice.user.meetingtype.1' => 'choice.user.meetingtype.1',
                    'choice.user.meetingtype.2' => 'choice.user.meetingtype.2'
                ),
                'multiple' => true,
                'expanded' => true,
                'label' => 'form.search.meetingtype',
                'translation_domain' => 'AppBundle',
                'required' => false
            ))
            ->add('animal', AdvancedSearchAnimalType::class)
        ;
    }

    public function getName()
    {
        return 'AppBundle_advanced_search';
    }
}