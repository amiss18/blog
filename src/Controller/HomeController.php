<?php

namespace App\Controller;

use App\Entity\Post;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PostRepository;

class HomeController extends AbstractController
{



	/**
      * Require ROLE_USER for only this controller method.
      * @Route("/home.php", name="home")
      * @param PostRepository $repository
	  * @return Response
      */
	public function home(PostRepository $repository): Response
	{
		// $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');


		$posts = $repository->findAll();

		// dump($posts);

		// $arr = array('ROLE_ADMIN', 'ROLE_USER');
		// echo json_encode($arr);

		
		return $this->render('pages/home.html.twig', [
			'posts' => $posts
		]);

	}
}