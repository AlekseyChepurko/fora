<?php
namespace Fora\TestBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class QuestionAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
        ->add('type', ChoiceType::class, array(
            'choices'=>array(
                'Has the only asnwer'=>'UniAnswer',
                'Has several answers'=>'MultiAnswer',
                'Has custom answer'=>'CustomAnswer',
                ),
            ))
        ->add('body', null, array(
            'label'=>"Enter the  question's text ",
            ))
        ->add('variants', CollectionType::class, array(
            'allow_add'=>'true',
            'allow_delete'=>'true',
            'label'=>'Enter variants for answer'
            ))
        ->add('answers', CollectionType::class, array(
            'allow_add'=>'true',
            'allow_delete'=>'true',
            'label'=>'Enter right answers',
            ))
        ->add('test_name', 'entity', array(
        	'class'=>'Fora\TestBundle\Entity\Test',
        	'choice_label'=>'name',
        	))
        ;
    }

	public function toString($object)
    {
        return $object instanceof Question
            ? $object->getId()
            : 'Question';
    }
    
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
        ->add('id')
        ->add('type')
        ->add('body')
        ->add('variants')
        ->add('answers')
        ->add('testName')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
        ->addIdentifier('id')
        ->addIdentifier('type')
        ->addIdentifier('body')
        ->addIdentifier('variants')
        ->addIdentifier('answers')
        ->addIdentifier('testName')
        ;
    }
}