<?php


namespace AppBundle\Controller\Admin\Chapter;


use AppBundle\Entity\Chapter;
use AppBundle\Form\Type\Chapter\ChapterCreationType;
use AppBundle\Form\Type\Chapter\ChapterEditionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EditionController extends Controller
{
    public function editAction(Request $request, Chapter $chapter)
    {
        $form = $this->createForm(ChapterCreationType::class, $chapter);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($chapter);
            $em->flush();

            return $this->redirectToRoute('app_admin_chapter_listing_list');
        }

        return $this->render('@Page/Admin/Chapter/Edition/edit.html.twig', array(
            'form' => $form->createView(),
            'chapter' => $chapter,
        ));
    }

    public function groupAction(Request $request, Chapter $chapter)
    {
        $form = $this->createForm(ChapterEditionType::class, $chapter);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($chapter);
            $em->flush();

            return $this->redirectToRoute('app_admin_chapter_showing_show', array('id' => $chapter->getId()));
        }

        return $this->render('@Page/Admin/Chapter/Edition/group.html.twig', array(
            'form' => $form->createView(),
            'chapter' => $chapter,
        ));
    }
}