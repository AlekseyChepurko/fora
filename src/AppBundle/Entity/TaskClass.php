<?php

namespace AppBundle\Entity;

//think about enum. now is just strings


class Task {
	private $type;
	private $text;
	private $answers;

	public function setType($val) {
		$this->$type = $val;
	}
	public function setTex ($value){
		$this->text = $value;
	}

	public function setAnswers($values){
		$this->$answers = $values;
	}

	public function getAll() {
		return (array('type'=>$this->$type, 'text'=>$this->$text));
	}

	public function getType(){
		return $this->$type;
	}

	public function getText(){
		return $this->$text;
	}

	public function getAnswers(){
		return $this->$answers;
	}
}