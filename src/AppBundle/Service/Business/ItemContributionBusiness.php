<?php

namespace AppBundle\Service\Business;

use AppBundle\Entity\Contribution;
use AppBundle\Entity\ItemContribution;
use AppBundle\Entity\Vote;
use AppBundle\Service\Util\AbstractContainerAware;

class ItemContributionBusiness extends AbstractContainerAware
{
    private $ITEM_CONTRIBUTION_SETTINGS = array(
        Vote::VOTE_FOR_CONTRIBUTION => 'vote_number_validation',
        Vote::VOTE_AGAINST_CONTRIBUTION => 'vote_number_cancellation',
    );

    public function addVoteToContribution(Vote $vote, ItemContribution $contribution)
    {
        $userContribution = new Contribution();
        $userContribution
            ->setItemContribution($vote)
            ->setUser($this->container->get('app.business.user')->getCurrentUser());
        $vote->setItemContribution($contribution);
        $contribution->addVote($vote);

        $number = $this->getVoteNumber($contribution, $vote->getValue());

        if ($number >= $this->container->getParameter($this->ITEM_CONTRIBUTION_SETTINGS[$vote->getValue()])) {
            switch ($vote->getValue()) {
                case(Vote::VOTE_FOR_CONTRIBUTION):
                    $contribution->setValidate(true);
                    break;
                case(Vote::VOTE_AGAINST_CONTRIBUTION):
                    $contribution->setBlocked(true);
                    break;
            }
        }

        $em = $this->container->get('doctrine')->getManager();

        $em->persist($vote);
        $em->persist($contribution);
        $em->persist($userContribution);

        $em->flush();
    }

    public function getVoteNumber(ItemContribution $contribution, $value)
    {
        $voteNumber = 0;

        foreach ($contribution->getVotes() as $vote) {
            if ($vote->getValue() === $value) {
                ++$voteNumber;
            }
        }

        return $voteNumber;
    }
}
