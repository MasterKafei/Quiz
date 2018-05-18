<?php

namespace AppBundle\Entity;

/**
 * Course
 */
class Course
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var chapters
     */
    private $chapters;

    /**
     * @var string|null
     */
    private $title;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set chapters.
     *
     * @param string
     *
     * @return Course
     */
    public function setChapters($chapters)
    {
        $this->title = $chapters;

        return $this;
    }

    /**
     * Get chapters.
     *
     * @return string
     */
    public function getChapters()
    {
        return $this->title;
    }

    /**
     * Set title.
     *
     * @param string|null $title
     *
     * @return Course
     */
    public function setTitle($title = null)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }
}
