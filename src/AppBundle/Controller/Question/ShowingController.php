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
            $answer->setUser($this->getUser());
            $answer->setQuestion($question);

            $quizSession = $this->get('app.business.quiz_session')->loadSession();

            if(!$quizSession) {
                return $this->redirectToRoute('app_quiz_session_creation_create', array('id' => $question->getQuiz()->getId()));
            } elseif($quizSession->getQuiz()->getId() !== $question->getQuiz()->getId()) {
                return $this->redirectToRoute('app_quiz_session_creation_create', array('id' => $question->getQuiz()->getId()));
            }

            $quizSession->addAnswers($answer);
            $this->get('app.business.quiz_session')->saveSession($quizSession);
            $nextQuestion = $this->get('app.business.question')->getNextQuizQuestion($question);

            if(!$nextQuestion) {

                return $this->redirectToRoute('app_quiz_session_showing_show');
            }

            return $this->redirectToRoute('app_question_showing_show', array(
               'id' => $nextQuestion->getId(),
            ));
        }

        return $this->render('@Page/Question/Showing/show.html.twig', array(
            'quiz' => $question->getQuiz(),
            'question' => $question,
            'form' => $form->createView(),
        ));
    }
}
