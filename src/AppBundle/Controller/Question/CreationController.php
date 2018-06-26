<?php

namespace AppBundle\Controller\Question;


use AppBundle\Entity\ItemContribution;
use AppBundle\Entity\Question;
use AppBundle\Entity\Quiz;
use AppBundle\Form\Type\Question\QuestionCreationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CreationController extends Controller
{
    public function createQuestionAction(Request $request, Quiz $quiz)
    {
        $question = new Question();
        $question->setQuiz($quiz);

        $form = $this->createForm(QuestionCreationType::class, $question);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($question);
            $em->flush();

            return $this->redirectToRoute('app_question_listing_user', array('id' => $quiz->getId()));
        }

        return $this->render('@Page/Question/Creation/create.html.twig', array(
            'form' => $form->createView(),
            'quiz' => $quiz,
        ));
    }

    public function chooseQuizAction()
    {
        $quizzes = $this->getDoctrine()->getRepository(ItemContribution::class)->findUserItemContributions($this->getUser());

        return $this->render('@Page/Question/Creation/choose_quiz.html.twig', array(
            'quizzes' => $quizzes,
        ));
    }
}
