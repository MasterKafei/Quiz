<?php
/**
 * Created by PhpStorm.
 * User: TheMa
 * Date: 18/02/2018
 * Time: 16:21
 */

namespace AppBundle\Controller\Admin\Question;

use AppBundle\Entity\Question;
use AppBundle\Entity\Quiz;
use AppBundle\Form\Type\Question\QuestionCreationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CreationController extends Controller
{
    public function createAction(Request $request)
    {
        return $this->render('@Page/Admin/Question/Creation/create.html.twig');
    }

    public function addAction(Request $request, Quiz $quiz)
    {
        $question = new Question();
        $form = $this->createForm(QuestionCreationType::class, $question);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $question->setQuiz($quiz);

            $em = $this->getDoctrine()->getManager();
            $em->persist($question);
            $em->flush();
            $form = $this->createForm(QuestionCreationType::class, new Question());
        }

        return $this->render('@Page/Admin/Question/Creation/add.html.twig', array(
            'form' => $form->createView(),
            'quiz' => $quiz,
        ));
    }
}