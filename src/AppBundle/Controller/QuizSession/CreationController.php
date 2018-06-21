<?php

namespace AppBundle\Controller\QuizSession;

use AppBundle\Entity\Quiz;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CreationController extends Controller
{
    public function createQuizSessionAction(Quiz $quiz)
    {
        $quizSession = $this->get('app.business.quiz_session')->createSession($quiz);
        $this->get('app.business.quiz_session')->saveSession($quizSession);

        return $this->redirectToRoute('app_question_showing_show', array(
            'id' => $quiz->getQuestions()[0]->getId(),
        ));
    }
}
