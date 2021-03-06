<?php
/**
 * Created by PhpStorm.
 * User: TheMa
 * Date: 19/02/2018
 * Time: 17:50
 */

namespace AppBundle\Controller\Admin\GapFill;

use AppBundle\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RemovingController extends Controller
{
    public function removeAction(Question $question)
    {
        $quiz = $question->getQuiz();
        $em = $this->getDoctrine()->getManager();
        $em->remove($question);
        $em->flush();

        return $this->redirectToRoute('app_admin_quiz_showing_show', array('id' => $quiz->getId()));
    }
}