<?php
/**
 * Created by PhpStorm.
 * User: TheMa
 * Date: 20/02/2018
 * Time: 13:34
 */

namespace AppBundle\Controller\Admin\Chapter;


use AppBundle\Entity\Chapter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RemovingController extends Controller
{
    public function removeAction(Chapter $chapter)
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($chapter);
        $em->flush();

        return $this->redirectToRoute('app_admin_chapter_listing_list');
    }
}