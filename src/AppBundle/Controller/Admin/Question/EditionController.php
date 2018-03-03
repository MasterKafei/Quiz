<?php
/**
 * Created by PhpStorm.
 * User: TheMa
 * Date: 19/02/2018
 * Time: 12:57
 */

namespace AppBundle\Controller\Admin\Question;

use AppBundle\Entity\Answer;
use AppBundle\Entity\Question;
use AppBundle\Form\Type\Question\QuestionCreationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EditionController extends Controller
{
    public function editAction(Request $request, Question $question)
    {
        $form = $this->createForm(QuestionCreationType::class, $question);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $answers = $this->getDoctrine()->getRepository(Answer::class)->findBy(array('question' => $question));
            foreach($answers as $answer)
            {
                $em->remove($answer);
            }

            $em->persist($question);
            $em->flush();

            return $this->redirectToRoute('app_admin_quiz_show_showing', array('id' => $question->getQuiz()->getId()));
        }

        return $this->render('@Page/Admin/Question/Edition/edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}