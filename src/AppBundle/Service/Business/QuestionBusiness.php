<?php

namespace AppBundle\Service\Business;


use AppBundle\Entity\Question;
use AppBundle\Service\Util\AbstractContainerAware;

class QuestionBusiness extends AbstractContainerAware
{
    public function getNextQuizQuestion(Question $question)
    {
        $questions = $question->getQuiz()->getQuestions();

        for ($i = 0; $i < count($questions); ++$i) {
            if ($questions[$i]->getId() == $question->getId()) {
                if ($i >= count($questions)) {
                    return null;
                }
                return $questions[$i + 1];
            }
        }

        return null;
    }
}
