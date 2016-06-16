<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
                'label' => 'form.user.username',
                'translation_domain' => 'UserBundle'
            ))
            ->add('email', EmailType::class, array(
                'label' => 'form.user.email',
                'translation_domain' => 'UserBundle'
            ))
            ->add('current_password', PasswordType::class, array(
                'label' => 'form.user.current_password',
                'translation_domain' => 'UserBundle',
                'mapped' => false,
                'constraints' => new UserPassword(),
            ))
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'options' => array('translation_domain' => 'UserBundle'),
                'first_options' => array('label' => 'form.user.new_password'),
                'second_options' => array('label' => 'form.user.new_password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',
                'required' => false
            ))
            ->add('firstname', TextType::class, array(
                'label' => 'form.user.firstname',
                'translation_domain' => 'UserBundle',
                'required' => false
            ))
            ->add('lastname', TextType::class, array(
                'label' => 'form.user.lastname',
                'translation_domain' => 'UserBundle',
                'required' => false
            ))
            ->add('picture', FileType::class, array(
                'label' => 'form.user.picture',
                'translation_domain' => 'UserBundle',
                'required' => false
            ))
            ->add('city', TextType::class, array(
                'label' => 'form.user.city',
                'translation_domain' => 'UserBundle',
                'required' => false
            ))
            ->add ('birthday', BirthdayType::class, array(
                'label' => 'form.user.birthday',
                'translation_domain' => 'UserBundle'
            ))
            ->add('biography', TextareaType::class, array(
                'label' => 'form.user.biography',
                'translation_domain' => 'UserBundle',
                'required' => false
            ))
            ->add('size', IntegerType::class, array(
                'label' => 'form.user.size',
                'translation_domain' => 'UserBundle',
                'required' => false
            ))
            ->add('weight', IntegerType::class, array(
                'label' => 'form.user.weight',
                'translation_domain' => 'UserBundle',
                'required' => false
            ))
            ->add('gender', ChoiceType::class, array(
                'choices' => array(
                    'choice.user.gender.1' => 'choice.user.gender.1',
                    'choice.user.gender.2' => 'choice.user.gender.2'
                ),
                'expanded' => true,
                'label' => 'form.user.gender',
                'translation_domain' => 'UserBundle',
                'required' => false
            ))
            ->add('orientation', ChoiceType::class, array(
                'choices' => array(
                    'choice.user.orientation.1' => 'choice.user.orientation.1',
                    'choice.user.orientation.2' => 'choice.user.orientation.2',
                    'choice.user.orientation.3' => 'choice.user.orientation.3',
                    'choice.user.orientation.4' => 'choice.user.orientation.4'
                ),
                'label' => 'form.user.orientation',
                'translation_domain' => 'UserBundle',
                'required' => false
            ))
            ->add('meetingtype', ChoiceType::class, array(
                'choices' => array(
                    'choice.user.meetingtype.1' => 'choice.user.meetingtype.1',
                    'choice.user.meetingtype.2' => 'choice.user.meetingtype.2'
                ),
                'label' => 'form.user.meetingtype',
                'translation_domain' => 'UserBundle',
                'required' => false
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