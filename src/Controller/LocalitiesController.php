<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Localities;
class LocalitiesController extends AbstractController
{
    /**
     * @Route("/localities", name="localities")
     */
    public function index(): Response
    {
		$repository = $this->getDoctrine()->getRepository(Localities::class);
        $localities = $repository->findAll();

        return $this->render('localities/index.html.twig', [
                        'localities' => $localities,
            'resource' => 'localities',

        ]);
    }
	/**
     * @Route("/localities/{id}", name="localitie_show")
     */
    public function show($id)
    {
        $repository = $this->getDoctrine()->getRepository(Localities::class);
        $localitie = $repository->find($id);

        return $this->render('localities/show.html.twig', [
            'localitie' => $localitie,
        ]);
    }

}
