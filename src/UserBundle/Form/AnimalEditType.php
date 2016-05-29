<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AnimalEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label' => 'form.name',
                'translation_domain' => 'Animal'
            ))
            ->add('age', TextType::class, array(
                'label' => 'form.age',
                'translation_domain' => 'Animal'
            ))
            ->add('gender', ChoiceType::class, array(
                'choices' => array(
                  'choice.gender.1' => 'choice.gender.1',
                  'choice.gender.2' => 'choice.gender.2'
                ),
                'label' => 'form.gender',
                'translation_domain' => 'Animal'
            ))
            ->add('kind', ChoiceType::class, array(
                'choices' => array(
                    'choice.kind.1' => 'choice.kind.1',
                    'choice.kind.2' => 'choice.kind.2'
                ),
                'label' => 'form.kind',
                'translation_domain' => 'Animal'
            ))
            ->add('race', TextType::class, array(
                'label' => 'form.race',
                'translation_domain' => 'Animal'
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\Animal'
        ));
    }

    public function getName()
    {
        return 'userbundle_animal';
    }
}