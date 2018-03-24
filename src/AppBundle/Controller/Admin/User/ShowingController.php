<?php

namespace AppBundle\Controller\Admin\User;

use AppBundle\Entity\Quiz;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShowingController extends Controller
{
    public function showAction(User $user)
    {
        $quizzes = $this->getDoctrine()->getRepository(Quiz::class)->getUserQuizzes($user);

        return $this->render('@Page/Admin/User/Showing/show.html.twig', array(
            'user' => $user,
            'quizzes' => $quizzes,
        ));
    }
}
