<?php

namespace AppBundle\Controller\Quiz;


use AppBundle\Entity\Quiz;
use AppBundle\Form\Type\Quiz\QuizEditionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EditionController extends Controller
{
    public function editUserQuizAction(Request $request, Quiz $quiz)
    {
        $form = $this->createForm(QuizEditionType::class, $quiz);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($quiz);
            $em->flush();

            return $this->redirectToRoute('app_quiz_listing_user');
        }

        return $this->render('@Page/Quiz/Edition/user.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
