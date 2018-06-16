<?php

namespace AppBundle\Controller\Chapter;


use AppBundle\Entity\Chapter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShowingController extends Controller
{
    public function showChapterAction(Chapter $chapter)
    {
        return $this->render('@Page/Chapter/Showing/show.html.twig', array(
            'chapter' => $chapter,
        ));
    }
}
