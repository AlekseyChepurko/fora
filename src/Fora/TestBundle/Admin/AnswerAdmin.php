<?php
namespace Fora\TestBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Form\FormMapper;

class AnswerAdmin extends Admin
{
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
        ->add('userName')
        ->add('testName')
        ->add('answers')
        ->add('rightAnswers')
        ->add('date')
        ->add('status')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
        ->addIdentifier('userName')
        ->addIdentifier('testName')
        ->addIdentifier('answers')
        ->addIdentifier('rightAnswers')
        ->addIdentifier('date')
        ->addIdentifier('status')
        ;
    }
}