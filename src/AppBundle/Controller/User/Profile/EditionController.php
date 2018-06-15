<?php

namespace AppBundle\Controller\User\Profile;


use AppBundle\Form\Type\User\Profile\Edition\EditProfileType;
use AppBundle\Service\Util\Console\Model\Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EditionController extends Controller
{
    public function editProfileAction(Request $request)
    {
        $form = $this->createForm(EditProfileType::class, $this->getUser(), array('action' => $this->get('router')->generate('app_user_profile_edition_edit')));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            try {
                $this->get('app.business.user')->hashPassword($this->getUser());
            } catch (\Exception $e) {

            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($this->getUser());
            $em->flush();

            $this->get('app.util.console')->add('user.profile.edition.edit.success', Message::TYPE_SUCCESS, 'fas fa-edit');
        }

        if ($this->get('app.business.request')->isMasterRequest()) {
            return $this->redirectToRoute('app_user_profile_showing_show');
        }

        return $this->render('@Page/User/Profile/Edition/edit.html.twig', array(
                'form' => $form->createView(),
            )
        );
    }
}
