<?php


namespace AppBundle\Service\Business;


use AppBundle\Entity\Answer;
use AppBundle\Entity\Quiz;
use AppBundle\Entity\User;
use AppBundle\Service\Util\AbstractContainerAware;
use Doctrine\ORM\EntityManager;

class QuizBusiness extends AbstractContainerAware
{

    public function resetQuiz(Quiz $quiz, User $user)
    {
        if(!$quiz->isResettable())
        {
            return;
        }

        $answers = $this->container->get('doctrine')->getRepository(Answer::class)->getUserAnswers($quiz->getQuestions(), $user);

        /** @var EntityManager $em */
        $em = $this->container->get('doctrine')->getManager();

        /** @var Answer $answer */
        foreach($answers as $answer)
        {
            $em->remove($answer);
        }

        $em->flush();
    }
}