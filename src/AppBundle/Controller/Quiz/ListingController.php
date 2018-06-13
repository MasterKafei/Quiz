<?php

namespace AppBundle\Controller\Quiz;


use AppBundle\Entity\Category;
use AppBundle\Entity\Question;
use AppBundle\Entity\Quiz;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;

class ListingController extends Controller
{

    /*public function newAction()
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
        }

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
    }*/

    public function listQuizAction(Request $request)
    {
        $pageNumber = $request->query->get('pageNumber');
        $search = $request->query->get('search');

        if ('' == $pageNumber || $pageNumber < 0) {
           $pageNumber = 0;
        }

        /** @var Paginator $paginator */
        $paginator = $this->getDoctrine()->getRepository(Quiz::class)->findAllRecent($pageNumber, $search);
        $quizzes = $paginator->getIterator()->getArrayCopy();
        $total = $paginator->count();

        return $this->render('@Page/Quiz/Listing/list.html.twig', array(
            'quizzes' => $quizzes,
            'total' => $total,
            'current_page' => $pageNumber + 1,
            'result_by_page' => 8,
        ));
    }
}
