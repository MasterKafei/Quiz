<?php

namespace AppBundle\Controller\Quiz;


use AppBundle\Entity\Contribution;
use AppBundle\Entity\Quiz;
use AppBundle\Form\Type\Quiz\QuizCreationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CreationController extends Controller
{
    public function createQuizAction(Request $request)
    {
        $quiz = new Quiz();

        $form = $this->createForm(QuizCreationType::class, $quiz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contribution = new Contribution();
            $contribution
                ->setItemContribution($quiz)
                ->setUser($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($contribution);
            $em->flush();
        }

        return $this->render('@Page/Quiz/Creation/create.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
