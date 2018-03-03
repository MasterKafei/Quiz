<?php


namespace AppBundle\Controller\Quiz;


use AppBundle\Entity\Quiz;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ResetController extends Controller
{
    public function resetAction(Quiz $quiz)
    {
        $this->get('app.business.quiz')->resetQuiz($quiz, $this->getUser());

        return $this->redirectToRoute('app_quiz_do_begin', array('id' => $quiz->getId()));
    }
}