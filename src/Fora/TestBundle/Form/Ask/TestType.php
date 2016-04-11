<?php

namespace Fora\TestBundle\Form\Ask;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TestType extends AbstractType{
	
	public function buildForm(FormBuilderInterface $builder, array $options){
		
			$builder
                ->add('questions',CollectionType::class, array(
                    'entry_type'=>QuestionType::class,
                    ))
    			->add('Submit', SubmitType::class)
				;
	}

	/**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Fora\TestBundle\Entity\Test'
        ));
    }
}