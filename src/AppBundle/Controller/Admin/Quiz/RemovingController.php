<?php
/**
 * Created by PhpStorm.
 * User: TheMa
 * Date: 17/02/2018
 * Time: 17:59
 */

namespace AppBundle\Controller\Admin\Quiz;

use AppBundle\Entity\Quiz;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RemovingController extends Controller
{
    public function removeAction(Quiz $quiz)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($quiz);
        $em->flush();

        return $this->redirectToRoute('app_admin_quiz_list_listing');
    }
}