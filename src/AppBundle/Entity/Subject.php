<?php

namespace AppBundle\Entity;

/**
 * Subject
 */
class Subject extends ItemContribution
{
    /**
     * @var Course
     */
    private $course;

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
     * @return Subject
     */
    public function setCourse($course)
    {
        $this->course = $course;

        return $this;
    }

    public function getContributionName()
    {
        return 'Subject';
    }
}
