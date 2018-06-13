<?php

namespace AppBundle\Service\Business;

use AppBundle\Entity\Answer;
use AppBundle\Entity\Question;
use AppBundle\Entity\Quiz;
use AppBundle\Entity\QuizSession;
use AppBundle\Entity\User;
use AppBundle\Service\Util\AbstractContainerAware;

class QuizSessionBusiness extends AbstractContainerAware
{
    const SESSION_KEY = 'SESSION_KEY';

    /**
     * @param Quiz $quiz
     * @return QuizSession
     */
    public function createSession(Quiz $quiz)
    {
        $quizSession = new QuizSession();
        $quizSession
            ->setQuiz($quiz);

        return $quizSession;
    }

    /**
     * @return QuizSession
     */
    public function loadSession()
    {

        $session = $this->container->get('session')->get(QuizSessionBusiness::SESSION_KEY, null);

        if ($session) {
            /** @var Quiz $quiz */
            $quiz = $this->container->get('doctrine')->getRepository(Quiz::class)->find($session['quiz']);

            $quizSession = new QuizSession();
            $quizSession->setQuiz($quiz)
                ->setAnswers($this->convertAnswers($session))
                ->setEndingDate($session['endingDate']);

            return $quizSession;
        }

        return $session;
    }

    /**
     * @param QuizSession $quizSession
     */
    public function saveSession(QuizSession $quizSession)
    {
        $session = array(
            'quiz' => $quizSession->getQuiz()->getId(),
            'endingDate' => $quizSession->getEndingDate(),
            'answers' => array(),
        );

        foreach ($quizSession->getAnswers() as $answer)
        $session['answers'][] = array(
            'user' => $answer->getUser()->getId(),
            'question' => $answer->getQuestion()->getId(),
            'value' => $answer->getValue(),
        );

        $this->container->get('session')->set(QuizSessionBusiness::SESSION_KEY, $session);
    }

    /**
     * @param $session
     * @return Answer[]
     */
    private function convertAnswers($session)
    {
        $answers = $session['answers'];
        $convertedAnswers = array();

        foreach ($answers as $answer) {
            $convertedAnswer = new Answer($this->container->get('doctrine')->getRepository(Question::class)->find($answer['question']));
            $convertedAnswer
                ->setUser($this->container->get('doctrine')->getRepository(User::class)->find($answer['user']))
                ->setValue($answer['value']);

            $convertedAnswers[] = $convertedAnswer;
        }

        return $convertedAnswers;
    }

    public function persistAnswersSession(User $user)
    {
        $session = $this->loadSession();
        $toRemoveAnswers = $this->container->get('doctrine')
            ->getRepository(Answer::class)
            ->getUserAnswers($session->getQuiz()->getQuestions(), $user);
        $answers = $session->getAnswers();

        $em = $this->container->get('doctrine')->getManager();

        foreach ($toRemoveAnswers as $answer) {
            $em->remove($answer);
        }

        foreach ($answers as $answer) {
            $em->persist($answer);
        }

        $em->flush();
    }

    public function deleteQuizSession()
    {
        $this->container->get('session')->remove(QuizSessionBusiness::SESSION_KEY);
    }
}
