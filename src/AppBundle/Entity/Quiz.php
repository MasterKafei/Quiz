<?php

namespace AppBundle\Entity;
use Symfony\Component\Validator\Constraints\Date;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Quiz
 * @Vich\Uploadable
 */
class Quiz extends ItemContribution
{
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
     * @var string
     * @Vich\UploadableField(mapping="image", fileNameProperty="imagePath")
     */
    private $image;

    /**
     * @var string
     */
    private $imagePath;

    /**
     * @var Category
     */
    private $category;

    /**
     * @var bool
     */
    private $resettable = true;

    /**
     * @var Course
     */
    private $course;

    /**
     * @var Date
     */
    private $startingDate;

    /**
     * @var Date
     */
    private $endingDate;

    /**
     * @var Date
     */
    private $validationDate;

    /**
     * @var Date
     */
    private $lastUpdate;

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
     * Set image
     *
     * @param $image
     * @return $this
     */
    public function setImage($image)
    {
        $this->image = $image;

        if ($image) {
           $this->lastUpdate = new \DateTime();
        }

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param $imagePath
     * @return $this
     */
    public function setImagePath($imagePath)
    {
        $this->imagePath = $imagePath;
        return $this;
    }

    /**
     * @return string
     */
    public function getImagePath()
    {
        return $this->imagePath;
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

    /**
     * @param $validationDate
     * @return $this
     */
    public function setValidationDate($validationDate)
    {
        $this->validationDate = $validationDate;
        return $this;
    }

    /**
     * @return Date
     */
    public function getValidationDate()
    {
        return $this->validationDate;
    }

    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;
        return $this;
    }

    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }

    public function getContributionName()
    {
        return "Test";
    }

    /**
     * Get course.
     *
     * @return Course
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * Set course.
     *
     * @param $course
     * @return $this
     */
    public function setCourse($course)
    {
        $this->course = $course;

        return $this;
    }
}


