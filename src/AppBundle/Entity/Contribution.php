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
     * @var ItemContribution
     */
    private $itemContribution;

    /**
     * @var bool
     */
    private $isPublic = false;

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
     * @return Contribution
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
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
     * Set itemContribution.
     *
     * @param ItemContribution $itemContribution
     *
     * @return Contribution
     */
    public function setItemContribution(ItemContribution $itemContribution)
    {
        $this->itemContribution = $itemContribution;
        return $this;
    }

    /**
     * @get itemContribution
     *
     * @return ItemContribution
     */
    public function getItemContribution()
    {
        return $this->itemContribution;
    }
}