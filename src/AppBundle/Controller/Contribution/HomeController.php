<?php

namespace AppBundle\Controller\Contribution;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Page/Contribution/Home/home.html.twig');
    }
}
