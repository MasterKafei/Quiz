<?php

namespace AppBundle\Controller\Admin\Quiz;

use AppBundle\Entity\Quiz;
use AppBundle\Form\Type\Quiz\QuizCreationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CreationController extends Controller
{
    public function createAction(Request $request)
    {
        $quiz = new Quiz();
        $form = $this->createForm(QuizCreationType::class, $quiz);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($quiz);
            $em->flush();

            return $this->redirectToRoute('app_admin_question_creation_add', array('id' => $quiz->getId()));
        }

        return $this->render('@Page/Admin/Quiz/Creation/create.html.twig', array(
            'form' => $form->createView(),
        ));

    }
}