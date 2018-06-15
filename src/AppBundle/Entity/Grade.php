<?php

namespace AppBundle\Entity;

use Vich\UploaderBundle\Entity\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Class Grade
 * @package AppBundle\Entity
 * @Vich\Uploadable
 */
class Grade
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var File
     * @Vich\UploadableField(mapping="image", fileNameProperty="imagePath")
     */
    private $image;

    /**
     * @var string
     */
    private $imagePath;

    /**
     * @var Course[]
     */
    private $courses;

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
     * Set name.
     *
     * @param string $name
     *
     * @return Grade
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     *
     * @return Grade
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return UploadedFile
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param UploadedFile $image
     *
     * @return Grade
     */
    public function setImage($image)
    {
        $this->image = $image;
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
     * @param string $imagePath
     *
     * @return Grade
     */
    public function setImagePath($imagePath)
    {
        $this->imagePath = $imagePath;
        return $this;
    }

    /**
     * Get courses.
     *
     * @return Course[]
     */
    public function getCourses()
    {
        return $this->courses;
    }

    /**
     * Set courses.
     *
     * @param $courses
     * @return $this
     */
    public function setCourses($courses)
    {
        $this->courses = $courses;

        return $this;
    }

    /**
     * Add course.
     *
     * @param $course
     */
    public function addCourse($course)
    {
        $this->courses[] = $course;
    }
}
