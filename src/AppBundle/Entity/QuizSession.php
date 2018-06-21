<?php

namespace AppBundle\Entity;


class QuizSession
{
    /**
     * @var Quiz
     */
    private $quiz;

    /**
     * @var Answer[]
     */
    private $answers = array();

    /**
     * @var \DateTime
     */
    private $endingDate;

    /**
     * Get quiz.
     *
     * @return Quiz
     */
    public function getQuiz()
    {
        return $this->quiz;
    }

    /**
     * Set quiz.
     *
     * @param $quiz
     * @return $this
     */
    public function setQuiz($quiz)
    {
        $this->quiz = $quiz;

        return $this;
    }

    /**
     * Get answers.
     *
     * @return Answer[]
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * Set answers.
     *
     * @param $answers
     * @return $this
     */
    public function setAnswers($answers)
    {
        $this->answers = $answers;

        return $this;
    }

    /**
     * Get endingDate.
     *
     * @return \DateTime
     */
    public function getEndingDate()
    {
        return $this->endingDate;
    }

    /**
     * Set endingDate.
     *
     * @param $endingDate
     * @return $this
     */
    public function setEndingDate($endingDate)
    {
        $this->endingDate = $endingDate;

        return $this;
    }

    public function addAnswers(Answer $answer)
    {
        for ($i = 0; $i < count($this->answers); ++$i) {
            if ($this->answers[$i]->getQuestion()->getId() === $answer->getQuestion()->getId()) {
                unset($this->answers[$i]);
                echo "PING";
            }
        }

        $this->answers[] = $answer;
    }
}
