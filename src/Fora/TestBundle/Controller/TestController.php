<?php

namespace Fora\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

use Fora\TestBundle\Form\Ask\TestType;
use Fora\TestBundle\Entity\Question;
use Fora\TestBundle\Entity\Test;
use Fora\TestBundle\Entity\Answer;

class TestController extends Controller
{   
    public function testingAction(Request $request, $test_name)
    {	

    	$test = new Test();

    	$questionRep =$this->getDoctrine()->getRepository('ForaTestBundle:Question');
    	$questions = $questionRep->findBytest_name($test_name);

    	foreach ($questions as $question) {
	    	$test->addQuestion($question);
    	}

    	$form = $this->createForm(TestType::class, $test);

    	$form->handleRequest($request);

    	if ($form->isSubmitted() && $form->isValid()){
    		$answers = array();
    		if ($this->getUser())
            	$userName = $this->getUser();
       	 	else
				$userName = "Guest";

    		foreach ($questions as $question) {
    			$answer = new Answer();
    			$answer->setDate(new \Datetime());
    			$answer->setUserName($userName);
    			$answer->setTestName($test_name);
    			$answer->setRightAnswers($question->getAnswers());
    			$answer->setStatus('false');

    			$em = $this->getDoctrine()->getManager();
    			switch ($question->getType()){
    				case 'UniAnswer':
    					$answer->addAnswer($request->request->get('question'.$question->getId()));
    					break;
    				case 'MultiAnswer':
    					// $form->handleRequest($request);
    					$i = 1;
    					$lenght = count($question->getVariants());
    					while ($i < $lenght+1){
    						$answer->addAnswer($request->request->get('question'.$question->getId().'_'.$i)); //ugly ugly hack. i have no idea what to do here. Here concats name of the field like question1_1
    						// $answer->addAnswer($form->get('question'.$question->getId().'_'.$i)->getData());
    						$i++;
    					}
    					break;
    				case 'CustomAnswer':
    				$answer->addAnswer($request->request->get('question'.$question->getId()));
    					break;
    				default: break;
    			}
			

    			$answer->setAnswers(array_filter($answer->getAnswers()));
    			$userAnswersCount = count($answer->getAnswers());
    			$rightAnswersCount = count($question->getAnswers());
    			$check = false;

				$diff = array_diff($answer->getAnswers(),$question->getAnswers());
    			if ($userAnswersCount === $rightAnswersCount){
    				if(count($diff)===0)
    					$check = true;
    				else
    					$check = false;
	    		}
    			if ($check === true)
    				$answer->setStatus(true);
    			else
    				$answer->setStatus(false);

    			$em->persist($answer);
    			$answers[] = $answer;
    		
    	}
    		$em->flush();
    		return $this->render('ForaTestBundle:Test:result.html.twig', array(
    			'answers'=>$answers,
    			'test_name'=>$test_name,
    			));
    	}

        return $this->render('ForaTestBundle:Test:test.html.twig', array(
        	'form'=>$form->createView(),
        	'questions'=>$questions,
        	'test_name'=>$test_name,
        	));
    }

    public function resultAction(Request $request)
    {
    	$answers = $request->query->get('answers');
    	$correct = array();
    	$incorrect = array();

    	$i=0;
    	foreach ($answers as $answer) {
    		if ($answer->getStatus() === true)
    			$correct[] = $i;
    		else 
    			$incorrect = $i;
    		$i++;
    	}

    	return $this->render('ForaTestBundle:Test:result.html.twig',array(
    		'answers'=>$answers,
    		'cor'=>$correct,
    		'incor'=>$incorrect,
    		));
    }


}
