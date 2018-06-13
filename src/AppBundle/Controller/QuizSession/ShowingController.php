<?php

namespace AppBundle\Controller\QuizSession;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShowingController extends Controller
{
    public function showQuizSessionAction()
    {
        $this->get('app.business.quiz_session')->persistAnswersSession($this->getUser());
        $quizSession = $this->get('app.business.quiz_session')->loadSession();
        $this->get('app.business.quiz_session')->deleteQuizSession();
        return $this->redirectToRoute('app_quiz_do_finish', array('id' => $quizSession->getQuiz()->getId()));
    }
}
