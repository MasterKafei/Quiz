<?php

namespace AppBundle\Controller\Chapter;


use AppBundle\Entity\Chapter;
use AppBundle\Form\Type\Chapter\ChapterEditionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EditionController extends Controller
{
    public function editChapterAction(Request $request, Chapter $chapter)
    {
        $form = $this->createForm(ChapterEditionType::class, $chapter);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($chapter);
            $em->flush();

            return $this->redirectToRoute('app_chapter_listing_user');
        }

        return $this->render('@Page/Chapter/Edition/user.html.twig',
            array(
                'form' => $form->createView(),
            ));
    }
}
