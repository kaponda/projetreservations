<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\RepresentationUser;
class RepresentationUserController extends AbstractController
{
    /**
     * @Route("/representation/user", name="representation_user")
     */
    public function index(): Response
    {
        $repository = $this->getDoctrine()->getRepository(RepresentationUser::class);
        $representationusers = $repository->findAll();

        return $this->render('representation_user/index.html.twig', [
            'representationusers' => $representationusers,
            'resource' => 'billets reservés',
        ]);
    }
}
