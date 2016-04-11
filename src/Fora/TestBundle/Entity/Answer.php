<?php

namespace Fora\TestBundle\Entity;

/**
 * Answer
 */
class Answer
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $userName;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $testName;

    /**
     * @var array
     */
    private $answers;

    /**
     * @var array
     */
    private $rightAnswers;

    /**
     * @var bool
     */
    private $status;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userName
     *
     * @param string $userName
     *
     * @return Answer
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Answer
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set testName
     *
     * @param string $testName
     *
     * @return Answer
     */
    public function setTestName($testName)
    {
        $this->testName = $testName;

        return $this;
    }

    /**
     * Get testName
     *
     * @return string
     */
    public function getTestName()
    {
        return $this->testName;
    }

    /**
     * Set answers
     *
     * @param array $answers
     *
     * @return Answer
     */
    public function setAnswers($answers)
    {
        $this->answers = $answers;

        return $this;
    }

    public function addAnswer($answer)
    {
        $this->answers[] = $answer;
        return $this;
    }
    /**
     * Get answers
     *
     * @return array
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * Set rightAnswers
     *
     * @param array $rightAnswers
     *
     * @return Answer
     */
    public function setRightAnswers($rightAnswers)
    {
        $this->rightAnswers = $rightAnswers;

        return $this;
    }

    /**
     * Get rightAnswers
     *
     * @return array
     */
    public function getRightAnswers()
    {
        return $this->rightAnswers;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return Answer
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }
}
