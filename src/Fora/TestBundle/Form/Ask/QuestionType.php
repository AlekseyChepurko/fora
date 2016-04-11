<?php

namespace Fora\TestBundle\Form\Ask;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class QuestionType extends AbstractType{
	
	public function buildForm(FormBuilderInterface $builder, array $options){
			$builder
				->add('body')
				;
	}

	/**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Fora\TestBundle\Entity\Question'
        ));
    }
}