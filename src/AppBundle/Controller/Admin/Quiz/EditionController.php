<?php
/**
 * Created by PhpStorm.
 * User: TheMa
 * Date: 17/02/2018
 * Time: 17:59
 */

namespace AppBundle\Controller\Admin\Quiz;

use AppBundle\Entity\Quiz;
use AppBundle\Form\Type\Quiz\QuizCreationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EditionController extends Controller
{
    public function editAction(Request $request, Quiz $quiz)
    {
        $form = $this->createForm(QuizCreationType::class, $quiz);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($quiz);
            $em->flush();

            return $this->redirectToRoute('app_admin_quiz_list_listing', array('id' => $quiz->getId()));
        }

        return $this->render('@Page/Admin/Quiz/Edition/edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}