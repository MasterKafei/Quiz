<?php

namespace AppBundle\Repository;

use AppBundle\Entity\User;
use AppBundle\Entity\Vote;
use Doctrine\ORM\EntityRepository;

class ContributionRepository extends EntityRepository
{
    public function findUserContributions(User $user)
    {
        $query = $this->_em->createQuery('
            SELECT contribution
            FROM AppBundle:Contribution contribution
            WHERE itemContribution NOT INSTANCE OF :vote
        ')
            ->setParameter('user', $user)
            ->setParameter('vote', $this->_em->getClassMetadata(Vote::class));

        return $query->getResult();
    }
}