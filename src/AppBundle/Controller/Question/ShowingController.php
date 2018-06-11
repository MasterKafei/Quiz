<?php

namespace AppBundle\Controller\Question;


use AppBundle\Entity\Answer;
use AppBundle\Entity\Question;
use AppBundle\Form\Type\Answer\AnswerCreationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ShowingController extends Controller
{
    public function showQuestionAction(Request $request, Question $question)
    {
        $answer = new Answer($question);
        $form = $this->createForm(AnswerCreationType::class, $answer);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($answer);
            $em->flush();
        }

        return $this->render('@Page/Question/Showing/show.html.twig', array(
            'quiz' => $question->getQuiz(),
            'question' => $question,
            'form' => $form->createView(),
        ));
    }
}
