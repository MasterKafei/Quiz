<?php

namespace AppBundle\Entity;

use Vich\UploaderBundle\Entity\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Contributor
 * @Vich\Uploadable
 */
class Contributor
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $role;

    /**
     * @var string|null
     */
    private $githubLink;

    /**
     * @var string|null
     */
    private $linkedinLink;

    /**
     * @var string|null
     */
    private $behanceLink;

    /**
     * @var string|null
     */
    private $email;

    /**
     * @var File
     * @Vich\UploadableField(mapping="image", fileNameProperty="photoPath")
     */
    private $photo;

    /**
     * @var string
     */
    private $photoPath;

    /**
     * @var \DateTime
     */
    private $lastUpdate;

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
     * Set firstName.
     *
     * @param string $firstName
     *
     * @return Contributor
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName.
     *
     * @param string $lastName
     *
     * @return Contributor
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set role.
     *
     * @param string $role
     *
     * @return Contributor
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role.
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set githubLink.
     *
     * @param string|null $githubLink
     *
     * @return Contributor
     */
    public function setGithubLink($githubLink = null)
    {
        $this->githubLink = $githubLink;

        return $this;
    }

    /**
     * Get githubLink.
     *
     * @return string|null
     */
    public function getGithubLink()
    {
        return $this->githubLink;
    }

    /**
     * Set linkedinLink.
     *
     * @param string|null $linkedinLink
     *
     * @return Contributor
     */
    public function setLinkedinLink($linkedinLink = null)
    {
        $this->linkedinLink = $linkedinLink;

        return $this;
    }

    /**
     * Get linkedinLink.
     *
     * @return string|null
     */
    public function getLinkedinLink()
    {
        return $this->linkedinLink;
    }

    /**
     * Set behanceLink.
     *
     * @param string|null $behanceLink
     *
     * @return Contributor
     */
    public function setBehanceLink($behanceLink = null)
    {
        $this->behanceLink = $behanceLink;

        return $this;
    }

    /**
     * Get behanceLink.
     *
     * @return string|null
     */
    public function getBehanceLink()
    {
        return $this->behanceLink;
    }

    /**
     * Set email.
     *
     * @param string|null $email
     *
     * @return Contributor
     */
    public function setEmail($email = null)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set photo.
     *
     * @param $photo
     * @return Contributor
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        if ($photo) {
           $this->lastUpdate = new \DateTime();
        }

        return $this;
    }

    /**
     * Get photo.
     *
     * @return File
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param $photoPath
     *
     * @return Contributor
     */
    public function setPhotoPath($photoPath)
    {
        $this->photoPath = $photoPath;
        return $this;
    }

    /**
     * Get photoPath.
     *
     * @return string
     */
    public function getPhotoPath()
    {
        return $this->photoPath;
    }
}
