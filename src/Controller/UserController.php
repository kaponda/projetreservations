<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(): Response
    {
		$repository = $this->getDoctrine()->getRepository(User::class);
        $users = $repository->findAll();
		
        return $this->render('user/index.html.twig', [
            'users' => $users,
            'resource' => 'users',
        ]);
    }
	    /**
     * @Route("/users/{id}", name="user_show")
     */
    public function show($id)
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $user = $repository->find($id);

        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

}
