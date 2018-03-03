<?php
/**
 * Created by PhpStorm.
 * User: TheMa
 * Date: 20/02/2018
 * Time: 12:35
 */

namespace AppBundle\Controller\Admin\Category;

use AppBundle\Entity\Category;
use AppBundle\Form\Type\Category\CategoryCreationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CreationController extends Controller
{
    public function createAction(Request $request)
    {
        $category = new Category();
        $form = $this->createForm(CategoryCreationType::class, $category);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            return $this->redirectToRoute('app_admin_category_listing_list');
        }

        return $this->render('@Page/Admin/Category/Creation/create.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}