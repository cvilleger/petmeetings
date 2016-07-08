<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AnimalEditType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
		->add('name', TextType::class, array(
			'label' => 'form.animal.name',
			'translation_domain' => 'UserBundle'
			))
		->add('picture', FileType::class, array(
			'label' => 'form.animal.picture',
			'translation_domain' => 'UserBundle',
			'required' => false
			))
		->add('age', IntegerType::class, array(
			'label' => 'form.animal.age',
			'translation_domain' => 'UserBundle',
			'required' => false
			))
		->add('gender', ChoiceType::class, array(
			'choices' => array(
				'choice.animal.gender.1' => 'choice.animal.gender.1',
				'choice.animal.gender.2' => 'choice.animal.gender.2'
				),
			'expanded' => true,
			'label' => 'form.animal.gender',
			'translation_domain' => 'UserBundle',
			'required' => false
			))
		->add('kind', ChoiceType::class, array(
			'choices' => array(
				'choice.animal.kind.1' => 'choice.animal.kind.1',
				'choice.animal.kind.2' => 'choice.animal.kind.2'
				),
			'label' => 'form.animal.kind',
			'translation_domain' => 'UserBundle'
			))
		->add('race', TextType::class, array(
			'label' => 'form.animal.race',
			'translation_domain' => 'UserBundle',
			'required' => false
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