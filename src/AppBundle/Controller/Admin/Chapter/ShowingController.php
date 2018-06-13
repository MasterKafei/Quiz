<?php


namespace AppBundle\Controller\Admin\Chapter;


use AppBundle\Entity\Chapter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShowingController extends Controller
{
    public function showAction(Chapter $chapter)
    {
        return $this->render('@Page/Admin/Chapter/Showing/show.html.twig', array(
            'chapter' => $chapter,
        ));
    }
}