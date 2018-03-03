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

class ShowingController extends Controller
{
    public function showAction(Quiz $quiz)
    {
        return $this->render('@Page/Admin/Quiz/Showing/show.html.twig', array(
            'quiz' => $quiz,
        ));
    }

}