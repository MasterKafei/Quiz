<?php

namespace AppBundle\Entity;

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
     * @var array
     */
    private $value;

    /**
     * @var User
     */
    private $user;

    /**
     * @var Question
     */
    private $question;

    public function __construct($question)
    {
        $this->setQuestion($question);
    }

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
     * Set value
     *
     * @param array $value
     *
     * @return Answer
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return array
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set user
     *
     * @param User $user
     * @return Answer
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }


    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set question
     *
     * @param Question $question
     * @return Answer
     */
    public function setQuestion($question)
    {
        $this->question = $question;
        return $this;
    }

    /**
     * Get question
     *
     * @return Question
     */
    public function getQuestion()
    {
        return $this->question;
    }
}

