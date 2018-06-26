<?php

namespace AppBundle\Repository;

use AppBundle\Entity\ItemContribution;
use AppBundle\Entity\User;
use AppBundle\Entity\Vote;
use Doctrine\ORM\EntityRepository;

class ItemContributionRepository extends EntityRepository
{
    /**
     * @return ItemContribution[]
     */
    public function findWaitItemContribution()
    {
        $query = $this->_em->createQuery('
            SELECT itemContribution
            FROM AppBundle:ItemContribution itemContribution
            WHERE itemContribution NOT INSTANCE OF :value
        
        ')
            ->setParameter('value', $this->_em->getClassMetadata(Vote::class));

        return $query->getResult();
    }

    public function findUserItemContributions(User $user, $type = null)
    {
        $contributions = $this->findWaitItemContribution();
        $result = array();
        foreach ($contributions as $contribution) {
            if ($contribution->getContribution() === null) {
                continue;
            }
            if ($contribution->getContribution()->getUser()->getId() === $user->getId()) {
                if ($type) {
                    if ($contribution instanceof $type) {
                        $result[] = $contribution->getContribution();
                    }
                } else {
                    $result[] = $contribution->getContribution();
                }
            }
        }

        return $result;
    }
}
