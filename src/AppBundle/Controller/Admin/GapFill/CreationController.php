<?php
/**
 * Created by PhpStorm.
 * User: TheMa
 * Date: 18/02/2018
 * Time: 16:21
 */

namespace AppBundle\Controller\Admin\GapFill;

use AppBundle\Entity\GapFill;
use AppBundle\Entity\Question;
use AppBundle\Entity\Quiz;
use AppBundle\Form\Type\GapFill\GapFillCreationType;
use AppBundle\Form\Type\Question\QuestionCreationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CreationController extends Controller
{
    public function createAction(Request $request)
    {
        $form = $this->createForm(GapFillCreationType::class, new GapFill());
        return $this->render('@Page/Admin/GapFill/Creation/create.html.twig', array(
        'form' => $form->createView()));
    }

    public function addAction(Request $request, Quiz $quiz)
    {
        $gapFill = new GapFill();
        $form = $this->createForm(GapFillCreationType::class, $gapFill);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $gapFill->setWordGap($quiz);

            $em = $this->getDoctrine()->getManager();
            $em->persist($gapFill);
            $em->flush();
            $form = $this->createForm(QuestionCreationType::class, new Question());
        }

        return $this->render('@Page/Admin/GapFill/Creation/add.html.twig', array(
            'form' => $form->createView(),
            'quiz' => $quiz,
        ));
    }
}