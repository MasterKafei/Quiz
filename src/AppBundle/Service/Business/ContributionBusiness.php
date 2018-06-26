<?php

namespace AppBundle\Service\Business;


use AppBundle\Entity\Contribution;
use AppBundle\Service\Util\AbstractContainerAware;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ContributionBusiness extends AbstractContainerAware
{
    public function canUserSeeContribution(Contribution $contribution)
    {
        return $contribution->getUser()->getId() === $this->container->get('app.business.user')->getCurrentUser()->getId();
    }

    public function isUserAllowToSeeContribution(Contribution $contribution)
    {
        if(!$this->canUserSeeContribution($contribution)) {
            throw new AccessDeniedHttpException();
        }
    }
}
