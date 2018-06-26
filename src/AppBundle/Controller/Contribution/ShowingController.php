<?php

namespace AppBundle\Controller\Contribution;


use AppBundle\Entity\Contribution;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShowingController extends Controller
{
    public function showContribution(Contribution $contribution)
    {
        $this->get('app.business.contribution')->isUserAllowToSeeContribution($contribution);

        return $this->render('@Page/Contribution/Showing/show.html.twig', array(
                'contribution' => $contribution,
            )
        );
    }
}
