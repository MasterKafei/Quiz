<?php
/**
 * Created by PhpStorm.
 * User: TheMa
 * Date: 20/02/2018
 * Time: 13:34
 */

namespace AppBundle\Controller\Admin\Category;


use AppBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShowingController extends Controller
{
    public function showAction(Category $category)
    {
        return $this->render('@Page/Admin/Category/Showing/show.html.twig', array(
            'category' => $category,
        ));
    }
}