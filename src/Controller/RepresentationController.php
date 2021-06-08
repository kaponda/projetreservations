<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Representation;
class RepresentationController extends AbstractController
{
    /**
     * @Route("/representations", name="representations")
     */
    public function index(): Response
    {
		$repository = $this->getDoctrine()->getRepository(Representation::class);
        $representations = $repository->findAll();

        return $this->render('representation/index.html.twig', [
            'representations' => $representations,
            'resource' => 'représentations',

        ]);
    }
	    /**
     * @Route("/representations/{id}", name="representation_show")
     */
    public function show($id)
    {
        $repository = $this->getDoctrine()->getRepository(Representation::class);
        $representation = $repository->find($id);

        return $this->render('representation/show.html.twig', [
            'representation' => $representation,
        ]);
    }

}
