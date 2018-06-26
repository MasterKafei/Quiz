<?php

namespace AppBundle\Controller\ItemContribution;


use AppBundle\Entity\Chapter;
use AppBundle\Entity\Course;
use AppBundle\Entity\ItemContribution;
use AppBundle\Entity\Quiz;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SubmittingController extends Controller
{
    public function submitItemContributionAction(ItemContribution $contribution)
    {
        $contribution->setSubmitted(true);

        $em = $this->getDoctrine()->getManager();
        $em->persist($contribution);
        $em->flush();

        $route =
            $contribution instanceof Quiz ?
            'app_quiz_listing_user' :
            (
                $contribution instanceof Course ?
                    'app_course_listing_user' :
                    (
                        $contribution instanceof Chapter ?
                            'app_chapter_listing_user' :
                            'app_item_contribution_listing_user'
                    )
            );

        return $this->redirectToRoute($route);
    }
}
