<?php

namespace AppBundle\Controller\Quiz;


use AppBundle\Entity\Category;
use AppBundle\Entity\Question;
use AppBundle\Entity\Quiz;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;

class ListingController extends Controller
{

    public function newAction()
    {
        /*$quizzes = $this->getDoctrine()->getRepository(Quiz::class)->getNewQuizzes($this->getUser());

        $categories = array();

        /** @var Quiz $quiz */
        /*foreach($quizzes as $quiz)
        {
            if(!array_key_exists($quiz->getCategory()->getId(), $categories))
            {
                $category = new Category();
                $category->setTitle($quiz->getCategory()->getTitle());
                $category->setDescription($quiz->getCategory()->getDescription());
                $category->setQuizzes(array());
                $categories[$quiz->getCategory()->getId()] = $category;
            }

            $category = $categories[$quiz->getCategory()->getId()];
            $tempQuizzes = $category->getQuizzes();
            $tempQuizzes[] = $quiz;
            $category->setQuizzes($tempQuizzes);
        }*/

        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();

        return $this->render('@Page/Quiz/Listing/list.html.twig', array(
            'categories' => $categories,
        ));
    }

    public function inProgressAction()
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();

        return $this->render('@Page/Quiz/Listing/in_progress.html.twig', array(
            'categories' => $categories,
        ));
    }

    public function completedAction()
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();

        return $this->render('@Page/Quiz/Listing/completed.html.twig', array(
            'categories' => $categories,
        ));
    }
}
