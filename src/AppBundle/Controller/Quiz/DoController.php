<?php

namespace AppBundle\Controller\Quiz;

use AppBundle\Entity\Answer;
use AppBundle\Entity\Question;
use AppBundle\Entity\Quiz;
use AppBundle\Form\Type\Answer\AnswerCreationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

class DoController extends Controller
{
    public function beginAction(Request $request, Quiz $quiz)
    {
        $answers = $this->getDoctrine()->getRepository(Answer::class)->getUserAnswers($quiz->getQuestions(), $this->getUser());

        return $this->render('@Page/Quiz/Doing/begin.html.twig', array(
            'quiz' => $quiz,
            'answers' => $answers
        ));
    }

    public function doAction(Request $request, Question $question)
    {
        $answer = new Answer($question);
        $form = $this->createForm(AnswerCreationType::class, $answer);
        $quiz = $question->getQuiz();
        $questions = $question->getQuiz()->getQuestions();
        $nextQuestion = null;

        if($quiz->getStartingDate() === null)
        {
            if($quiz->getEndingDate() === null)
            {
                $allowed = true;
            }
            else
            {
                $allowed = $quiz->getEndingDate() < new DateTime('now');
            }
        }
        else if($quiz->getStartingDate() > new DateTime('now'))
        {
            $allowed = false;
        }
        else
        {
            if($quiz->getEndingDate() === null)
            {
                $allowed = true;
            }
            else
            {
                $allowed = $quiz->getEndingDate() < new DateTime('now');
            }
        }

        if(!$allowed)
        {
            return $this->redirectToRoute('app_quiz_list_new');
        }

        for($i = 0; $i < count($questions) - 1; ++$i)
        {
            if($questions[$i]->getId() == $question->getId())
            {
                $nextQuestion = $questions[$i + 1];
                break;
            }
        }

        $isAlreadyCreated = count($this->getDoctrine()->getRepository(Answer::class)->getUserAnswers(array($question), $this->getUser())) > 0;

        if($isAlreadyCreated)
        {
            if($nextQuestion == null)
            {
                return $this->redirectToRoute('app_quiz_do_finish', array(
                    'id' => $quiz->getId()
                ));
            }
            return $this->redirectToRoute('app_quiz_do_doing', array(
                'id' => $nextQuestion->getId()
            ));
        }

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $answer->setUser($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($answer);
            $em->flush();

            if($nextQuestion == null)
            {
                return $this->redirectToRoute('app_quiz_do_finish', array(
                    'id' => $quiz->getId()
                ));
            }

            return $this->redirectToRoute('app_quiz_do_doing', array(
                'id' => $nextQuestion->getId()
            ));
        }

        return $this->render('@Page/Quiz/Doing/do.html.twig', array(
            'form' => $form->createView(),
            'question' => $question,
        ));
    }

    public function finishAction(Request $request, Quiz $quiz)
    {

        $answers = $this->getDoctrine()->getRepository(Answer::class)->getUserAnswers($quiz->getQuestions(), $this->getUser());
        $questions = $quiz->getQuestions();
        if(count($answers) != count($questions))
        {
            if(count($questions) == 0)
            {
                return $this->redirectToRoute('app_quiz_do_begin', array('id' => $quiz->getId()));
            }
            return $this->redirectToRoute('app_quiz_do_doing', array('id' => $quiz->getQuestions()[0]->getId()));
        }

        return $this->render('@Page/Quiz/Doing/finish.html.twig', array(
            'answers' => $answers,
            'quiz' => $quiz,
        ));
    }
}