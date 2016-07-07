<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AdvancedSearchSizeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('minSize', IntegerType::class, array(
                'label' => 'form.search.size',
                'translation_domain' => 'AppBundle',
                'required' => false
            ))
            ->add('maxSize', IntegerType::class, array(
                'label' => 'form.search.and',
                'translation_domain' => 'AppBundle',
                'required' => false
            ))
        ;
    }

    public function getName()
    {
        return 'AppBundle_advanced_search_size';
    }
}