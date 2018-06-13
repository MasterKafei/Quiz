<?php
/**
 * Created by PhpStorm.
 * User: TheMa
 * Date: 20/02/2018
 * Time: 13:34
 */

namespace AppBundle\Controller\Admin\Course;


use AppBundle\Entity\Course;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RemovingController extends Controller
{
    public function removeAction(Course $course)
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($course);
        $em->flush();

        return $this->redirectToRoute('app_admin_course_listing_list');
    }
}