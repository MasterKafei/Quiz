<?php

namespace AppBundle\Entity;

/**
 * Question
 */
class Question extends ItemContribution
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $text;

    /**
     * @var array
     */
    private $responses;

    /**
     * @var array
     */
    private $solution;

    /**
     * @var Quiz
     */
    private $quiz;

    /**
     * @var Answer[]
     */
    private $answers = array();


    /**
     * Set title
     *
     * @param string $title
     *
     * @return Question
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Question
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set responses
     *
     * @param array $responses
     *
     * @return Question
     */
    public function setResponses($responses)
    {
        $this->responses = $responses;

        return $this;
    }

    /**
     * Get responses
     *
     * @return array
     */
    public function getResponses()
    {
        return $this->responses;
    }

    /**
     * Set solution
     *
     * @param array $solution
     *
     * @return Question
     */
    public function setSolution($solution)
    {
        $this->solution = $solution;

        return $this;
    }

    /**
     * Get solution
     *
     * @return array
     */
    public function getSolution()
    {
        return $this->solution;
    }

    /**
     * Get quiz
     *
     * @return Quiz
     */
    public function getQuiz()
    {
        return $this->quiz;
    }

    /**
     * Set quiz
     *
     * @param $quiz
     * @return $this
     */
    public function setQuiz($quiz)
    {
        $this->quiz = $quiz;
        return $this;
    }

    /**
     * Get answers
     *
     * @return Answer[]
     */
    public function getAnswers()
    {
        return $this->answers;
    }


    /**
     * Set answers
     *
     * @param Answer[] $answers
     * @return Question
     */
    public function setAnswers($answers)
    {
        $this->answers = $answers;
        return $this;
    }

    public function getContributionName()
    {
        return 'Question';
    }
}

