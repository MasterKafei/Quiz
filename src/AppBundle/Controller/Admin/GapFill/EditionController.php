<?php
/**
 * Created by PhpStorm.
 * User: TheMa
 * Date: 19/02/2018
 * Time: 12:57
 */

namespace AppBundle\Controller\Admin\GapFill;

use AppBundle\Entity\Answer;
use AppBundle\Entity\GapFill;
use AppBundle\Form\Type\Question\QuestionCreationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EditionController extends Controller
{
    public function editAction(Request $request, GapFill $question)
    {
        $form = $this->createForm(GapFillCreationType::class, $question);

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

            return $this->redirectToRoute('app_admin_quiz_showing_show', array('id' => $question->getQuiz()->getId()));
        }

        return $this->render('@Page/Admin/Question/Edition/edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}