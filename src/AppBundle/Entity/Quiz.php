<?php

namespace AppBundle\Entity;
use Symfony\Component\Validator\Constraints\Date;

/**
 * Quiz
 */
class Quiz
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var array
     */
    private $questions;

    /**
     * @var array
     */
    private $marks;


    /**
     * @var Category
     */
    private $category;

    /**
     * @var bool
     */
    private $resettable;

    /**
     * @var Date
     */
    private $startingDate;

    /**
     * @var Date
     */
    private $endingDate;

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
     * Set title
     *
     * @param string $title
     *
     * @return Quiz
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
     * Set description
     *
     * @param string $description
     *
     * @return Quiz
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set questions
     *
     * @param Question[] $questions
     *
     * @return Quiz
     */
    public function setQuestions($questions)
    {
        $this->questions = $questions;

        return $this;
    }

    /**
     * Get questions
     *
     * @return Question[]
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Set marks
     *
     * @param array $marks
     *
     * @return Quiz
     */
    public function setMarks($marks)
    {
        $this->marks = $marks;

        return $this;
    }

    /**
     * Get marks
     *
     * @return array
     */
    public function getMarks()
    {
        return $this->marks;
    }

    /**
     * Set category
     *
     * @param $category
     * @return Quiz
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Get category
     *
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set resettable
     *
     * @param $resettable
     * @return Quiz
     */
    public function setResettable($resettable)
    {
        $this->resettable = $resettable;
        return $this;
    }

    /**
     * Get resettable
     *
     * @return bool
     */
    public function isResettable()
    {
        return $this->resettable;
    }

    /**
     * Set startingDate
     *
     * @param $startingDate
     * @return Quiz
     */
    public function setStartingDate($startingDate)
    {
        $this->startingDate = $startingDate;
        return $this;
    }

    /**
     * Get startingDate
     *
     * @return Date
     */
    public function getStartingDate()
    {
        return $this->startingDate;
    }

    /**
     * Set endingDate
     *
     * @param $endingDate
     * @return $this
     */
    public function setEndingDate($endingDate)
    {
        $this->endingDate = $endingDate;
        return $this;
    }


    /**
     * Get endingDate
     *
     * @return Date
     */
    public function getEndingDate()
    {
        return $this->endingDate;
    }
}
