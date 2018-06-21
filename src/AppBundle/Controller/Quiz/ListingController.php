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
    public function listQuizAction(Request $request)
    {
        $pageNumber = $request->query->get('pageNumber');
        $search = $request->query->get('search');

        if ('' == $pageNumber || $pageNumber < 0) {
           $pageNumber = 1;
        }

        /** @var Paginator $paginator */
        $paginator = $this->getDoctrine()->getRepository(Quiz::class)->findAllRecent($pageNumber - 1, $search);
        $quizzes = $paginator->getIterator()->getArrayCopy();
        $total = $paginator->count();

        return $this->render('@Page/Quiz/Listing/list.html.twig', array(
            'search' => $search,
            'quizzes' => $quizzes,
            'total' => $total,
            'current_page' => $pageNumber,
            'result_by_page' => 8,
        ));
    }
}
