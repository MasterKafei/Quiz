<?php

namespace AppBundle\Entity;

/**
 * Category
 */
class Category
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
     * @var Quiz[]
     */
    private $quizzes;


    /**
     * @var UserGroup[]
     */
    private $groups;

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
     * @return Category
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
     * @return Category
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
     * Set quizzes
     *
     * @param Quiz[] $quizzes
     *
     * @return Category
     */
    public function setQuizzes($quizzes)
    {
        $this->quizzes = $quizzes;

        return $this;
    }

    /**
     * Get quizzes
     *
     * @return Quiz[]
     */
    public function getQuizzes()
    {
        return $this->quizzes;
    }

    /**
     * Set groups
     *
     * @param UserGroup[] $groups
     * @return Category
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;
        return $this;
    }

    /**
     * Get groups
     *
     * @return UserGroup[]
     */
    public function getGroups()
    {
        return $this->groups;
    }
}

