<?php

namespace AppBundle\Controller\Admin\Chapter;

use AppBundle\Entity\Chapter;
use AppBundle\Entity\Course;
use AppBundle\Form\Type\Chapter\ChapterCreationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CreationController extends Controller
{
    public function createAction(Request $request, Course $course)
    {
        $chapter = new Chapter();
        $form = $this->createForm(ChapterCreationType::class, $chapter);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $chapter->setCourse($course);
            $em = $this->getDoctrine()->getManager();
            $em->persist($chapter, $course);
            $em->flush();

            return $this->redirectToRoute('app_admin_chapter_listing_list');
        }

        return $this->render('@Page/Admin/Chapter/Creation/create.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
