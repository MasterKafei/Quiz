<?php

namespace AppBundle\Controller\Contribution;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CreationController extends Controller
{
    public function createContributionAction()
    {
        return $this->render('@Page/Contribution/Creation/create.html.twig');
    }
}
