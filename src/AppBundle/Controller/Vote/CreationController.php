<?php

namespace AppBundle\Controller\Vote;


use AppBundle\Entity\ItemContribution;
use AppBundle\Entity\Vote;
use AppBundle\Form\Type\Vote\CreationVoteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CreationController extends Controller
{
    public function createVoteAction(Request $request, ItemContribution $contribution)
    {
        $vote = new Vote();

        $form = $this->createForm(CreationVoteType::class, $vote);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->get('app.business.item_contribution')->addVoteToContribution($vote, $contribution);

            return $this->redirectToRoute('app_vote_creation_preview');
        }

        return $this->render('@Page/Vote/Creation/create.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function previewContributionsAction()
    {
        $contributions = $this->getDoctrine()->getRepository(ItemContribution::class)->findWaitItemContribution();

        return $this->render('@Page/Vote/Creation/preview.html.twig', array(
            'contributions' => $contributions,
        ));
    }
}
