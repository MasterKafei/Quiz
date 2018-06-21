<?php


namespace AppBundle\Entity;


class Contribution
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var User
     */
    private $user;

    /**
     * @var IContribution
     */
    private $icontribution;

    /**
     * @var bool
     */
    private $isPublic;

    /**
     * @get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user.
     *
     * @param User $user
     *
     * @return User
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set icontribution.
     *
     * @param IContribution $icontribution
     *
     * @return Contribution
     */
    public function setIContribution($icontribution)
    {
        $this->icontribution = $icontribution;
        return $this;
    }

    /**
     * @get icontribution
     *
     * @return IContribution
     */
    public function getIContribution()
    {
        return $this->icontribution;
    }
}