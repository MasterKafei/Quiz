<?php

namespace AppBundle\Controller\Question;


use AppBundle\Entity\Contribution;
use AppBundle\Entity\ItemContribution;
use AppBundle\Entity\Quiz;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListingController extends Controller
{
    public function chooseQuizAction()
    {
        /** @var Contribution[] $quizzes */
        $quizzes = $this->getDoctrine()->getRepository(ItemContribution::class)->findUserItemContributions($this->getUser(), Quiz::class);

        return $this->render('@Page/Question/Listing/choose_quiz.html.twig', array(
            'quizzes' => $quizzes,
        ));
    }

    public function listUserQuestionAction(Quiz $quiz)
    {
        return $this->render('@Page/Question/Listing/user.html.twig', array('contributions' => $quiz->getQuestions()));
    }
}
