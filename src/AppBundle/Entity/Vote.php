<?php

namespace AppBundle\Entity;


class Vote extends ItemContribution
{
    const VOTE_AGAINST_CONTRIBUTION = 'VOTE_AGAINST_CONTRIBUTION';
    const VOTE_FOR_CONTRIBUTION = 'VOTE_FOR_CONTRIBUTION';

    /**
     * @var ItemContribution
     */
    private $itemContribution;

    /**
     * @var string
     */
    private $value;

    public function getItemContribution()
    {
        return $this->itemContribution;
    }

    public function setItemContribution($itemContribution)
    {
        if ($itemContribution instanceof Vote) {
            return;
        }
        $this->itemContribution = $itemContribution;
    }

    /**
     * Get value.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function getContributionName()
    {
        return 'Vote';
    }
}
