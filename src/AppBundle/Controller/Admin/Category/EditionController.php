<?php
/**
 * Created by PhpStorm.
 * User: TheMa
 * Date: 20/02/2018
 * Time: 13:34
 */

namespace AppBundle\Controller\Admin\Category;


use AppBundle\Entity\Category;
use AppBundle\Form\Type\Category\CategoryCreationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EditionController extends Controller
{
    public function editAction(Request $request, Category $category)
    {
        $form = $this->createForm(CategoryCreationType::class, $category);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            return $this->redirectToRoute('app_admin_category_listing_list');
        }

        return $this->render('@Page/Admin/Category/Edition/edit.html.twig', array(
            'form' => $form->createView(),
            'category' => $category,
        ));
    }
}