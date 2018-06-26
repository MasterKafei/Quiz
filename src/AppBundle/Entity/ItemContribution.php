<?php

namespace AppBundle\Entity;

abstract class ItemContribution
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var Contribution
     */
    private $contribution;

    /**
     * @var bool
     */
    private $validate = false;

    /**
     * @var bool
     */
    private $submitted = false;

    /**
     * @var bool
     */
    private $blocked = false;

    /**
     * @var Vote[]
     */
    private $votes;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get contribution.
     *
     * @return Contribution
     */
    public function getContribution()
    {
        return $this->contribution;
    }

    /**
     * Set contribution.
     *
     * @param $contribution
     * @return ItemContribution
     */
    public function setContribution($contribution)
    {

        $this->contribution = $contribution;

        return $this;
    }

    /**
     * Get validate.
     *
     * @return bool
     */
    public function getValidate()
    {
        return $this->validate;
    }

    /**
     * Set validate.
     *
     * @param $validate
     * @return $this
     */
    public function setValidate($validate)
    {
        $this->validate = $validate;

        return $this;
    }

    /**
     * Get submitted.
     *
     * @return bool
     */
    public function getSubmitted()
    {
        return $this->submitted;
    }

    /**
     * Set submitted.
     *
     * @param $submitted
     * @return ItemContribution
     */
    public function setSubmitted($submitted)
    {
        $this->submitted = $submitted;

        return $this;
    }

    /**
     * Get votes.
     *
     * @return Vote[]
     */
    public function getVotes()
    {
        return $this->votes;
    }

    /**
     * Set votes.
     *
     * @param Vote[] $votes
     * @return ItemContribution
     */
    public function setVotes($votes)
    {
        $this->votes = $votes;

        return $this;
    }

    /**
     * Add vote.
     *
     * @param $vote
     * @return $this
     */
    public function addVote($vote)
    {
        $this->votes[] = $vote;

        return $this;
    }

    /**
     * Get blocked.
     *
     * @return bool
     */
    public function getBlocked()
    {
        return $this->blocked;
    }

    /**
     * Set blocked.
     *
     * @param $blocked
     * @return $this
     */
    public function setBlocked($blocked)
    {
        $this->blocked = $blocked;

        return $this;
    }

    public abstract function getContributionName();
}