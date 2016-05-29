<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use UserBundle\Form\AnimalEditType;

class UserEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, array(
                'label' => 'form.username',
                'translation_domain' => 'User'
            ))
            ->add('current_password', PasswordType::class, array(
                'label' => 'form.current_password',
                'translation_domain' => 'User',
                'mapped' => false,
                'constraints' => new UserPassword(),
            ))
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'options' => array('translation_domain' => 'User'),
                'first_options' => array('label' => 'form.new_password'),
                'second_options' => array('label' => 'form.new_password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
            ->add('firstname', TextType::class, array(
                'label' => 'form.firstname',
                'translation_domain' => 'User'
            ))
            ->add('lastname', TextType::class, array(
                'label' => 'form.lastname',
                'translation_domain' => 'User'
            ))
            ->add('city', TextType::class, array(
                'label' => 'form.city',
                'translation_domain' => 'User'
            ))
            ->add ('birthday', DateType::class, array(
                'label' => 'form.birthday',
                'translation_domain' => 'User'
            ))
            ->add('biography', TextareaType::class, array(
                'label' => 'form.biography',
                'translation_domain' => 'User'
            ))
            ->add('size', TextType::class, array(
                'label' => 'form.size',
                'translation_domain' => 'User'
            ))
            ->add('weight', TextType::class, array(
                'label' => 'form.weight',
                'translation_domain' => 'User'
            ))
            ->add('gender', ChoiceType::class, array(
                'choices' => array(
                    'profile.edit.gender.choice1' => 'profile.edit.gender.choice1',
                    'profile.edit.gender.choice2' => 'profile.edit.gender.choice2'
                ),
                'label' => 'form.gender',
                'translation_domain' => 'User'
            ))
            ->add('orientation', ChoiceType::class, array(
                'choices' => array(
                    'profile.edit.orientation.choice1' => 'profile.edit.orientation.choice1',
                    'profile.edit.orientation.choice2' => 'profile.edit.orientation.choice2',
                    'profile.edit.orientation.choice3' => 'profile.edit.orientation.choice3',
                    'profile.edit.orientation.choice4' => 'profile.edit.orientation.choice4'
                ),
                'label' => 'form.orientation',
                'translation_domain' => 'User'
            ))
            ->add('meetingtype', ChoiceType::class, array(
                'choices' => array(
                    'profile.edit.meetingtype.choice1' => 'profile.edit.meetingtype.choice1',
                    'profile.edit.meetingtype.choice2' => 'profile.edit.meetingtype.choice2'
                ),
                'label' => 'form.meetingtype',
                'translation_domain' => 'User'
            ))
            ->add('animal', AnimalEditType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'userbundle_user';
    }
}