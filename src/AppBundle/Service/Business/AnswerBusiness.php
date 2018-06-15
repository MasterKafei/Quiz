<?php

namespace AppBundle\Service\Business;

use AppBundle\Entity\Answer;
use AppBundle\Entity\Quiz;
use AppBundle\Entity\User;
use AppBundle\Service\Util\AbstractContainerAware;

class AnswerBusiness extends AbstractContainerAware
{
    public function getWrongUserAnswerOfQuiz(Quiz $quiz, User $user)
    {
        return $this->getWrongUserAnswerOfQuestions($quiz->getQuestions(), $user);
    }

    public function getRightUserAnswerOfQuiz(Quiz $quiz, User $user)
    {
        return $this->getRightUserAnswerOfQuestions($quiz->getQuestions(), $user);
    }

    public function getWrongUserAnswerOfQuestions($questions, User $user)
    {
        /** @var Answer[] $answers */
        $answers = $this->container
            ->get('doctrine')
            ->getRepository(Answer::class)
            ->getUserAnswers($questions, $user);

        $wrongAnswers = array();

        foreach ($answers as $answer) {
            $solution = $answer->getQuestion()->getSolution();
            $userSolution = $answer->getValue();

            if (count($solution) !== count($userSolution)) {
                $wrongAnswers[] = $answer;
            } else {
                foreach ($userSolution as $key => $value) {
                    if(!array_key_exists($key, $solution)) {
                        $wrongAnswers[] = $answer;
                        break;
                    }
                }
            }
        }

        return $wrongAnswers;
    }

    public function getRightUserAnswerOfQuestions($questions, User $user)
    {
        /** @var Answer[] $answers */
        $answers = $this->container
            ->get('doctrine')
            ->getRepository(Answer::class)
            ->getUserAnswers($questions, $user);

        $rightAnswers = array();

        foreach ($answers as $answer) {
            $solution = $answer->getQuestion()->getSolution();
            $userSolution = $answer->getValue();

            if (count($solution) === count($userSolution)) {
                $isRightAnswer = true;
                foreach ($userSolution as $key => $value) {

                    if(!array_key_exists($key, $solution)) {
                        $isRightAnswer = false;
                        break;
                    }
                }

                if ($isRightAnswer) {
                    $rightAnswers[] = $answer;
                }
            }
        }

        return $rightAnswers;
    }
}
