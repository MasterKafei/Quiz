<?php

namespace AppBundle\Controller\Quiz;


use AppBundle\Entity\Quiz;
use AppBundle\Form\Type\Quiz\QuizCreationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CreationController extends Controller
{
    public function createQuizAction(Request $request)
    {
        $quiz = new Quiz();

        $form = $this->createForm(QuizCreationType::class, $quiz);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($quiz);
            $em->flush();
        }

        return $this->render('@Page/Quiz/Creation/create.html.twig');
    }
}
