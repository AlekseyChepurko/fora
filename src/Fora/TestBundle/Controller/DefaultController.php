<?php

namespace Fora\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Fora\TestBundle\Entity\Test;
use Fora\TestBundle\Entity\Question;

class DefaultController extends Controller
{


    public function indexAction()
    {	
        if ($this->getUser())
            $username = $this->getUser();
        else
            $username = "Stranger";

        $questionRep =$this->getDoctrine()->getRepository('ForaTestBundle:Question'); 
        $testRep = $this->getDoctrine()->getRepository('ForaTestBundle:Test');

        $questions = $questionRep->findAll();
        $tests = $testRep->findAll();
        
        return $this->render('ForaTestBundle:Default:index.html.twig',array(
            'username'=>$username,
            'tests'=>$tests
            ));
    }

    public function testingAction($test_name)
    {   if ($this->getUser())
            $username = $this->getUser();
        else
            $username = "Stranger";
        return $this->render('ForaTestBundle:Default:test.html.twig',array(
            'username'=>$username,
            'test_name'=>$test_name
            ));
    }
}
