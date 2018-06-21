<?php

namespace AppBundle\Controller\User\Profile;

use AppBundle\Entity\Answer;
use AppBundle\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShowingController extends Controller
{
    public function showProfileAction()
    {
        $questions = $this->getDoctrine()->getRepository(Question::class)->getPublicQuestion();

        $questionNumberAnswer = count($this->getDoctrine()->getRepository(Question::class)->getUserAnsweredQuestion($this->getUser()));
        $questionNumber = count($questions);
        $rightAnswersSubmitted = count($this->get('app.business.answer')->getRightUserAnswerOfQuestions($questions, $this->getUser()));
        //$quizNumberUserFinished = count($this->get('app.business.quiz')->)
        return $this->render('@Page/User/Profile/Showing/show.html.twig',
            array(
                'questionNumberAnswer' => $questionNumberAnswer,
                'questionNumber' => $questionNumber,
                'rightAnswersSubmitted' => $rightAnswersSubmitted,
            ));
    }
}
