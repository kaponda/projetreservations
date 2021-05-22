<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Types;
class TypesController extends AbstractController
{
    /**
     * @Route("/types", name="types")
     */
    public function index(): Response
    {
		$repository = $this->getDoctrine()->getRepository(Types::class);
        $types = $repository->findAll();

        return $this->render('types/index.html.twig', [
            'types' => $types,
            'resource' => 'artistes',

        ]);
    }
	    /**
     * @Route("/types/{id}", name="type_show")
     */
    public function show($id)
    {
        $repository = $this->getDoctrine()->getRepository(Types::class);
        $type = $repository->find($id);

        return $this->render('types/show.html.twig', [
            'type' => $type,
        ]);
    }

}
