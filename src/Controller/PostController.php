<?php

namespace App\Controller;

use Twig\Environment;
use App\Entity\Post;
use App\Form\PostType;
use App\Form\CreatePostType;
use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\FormBuilderInterface;


class PostController extends AbstractController
{

	/**
	*	@var Environment
	**/
	private $twig;

	/**
	*	@var PostRepository
	**/
	private $repository;

	public function __construct(Environment $twig, PostRepository $repository)
	{
		$this->twig = $twig;
		$this->repository = $repository;

	}

	/**
	* 	Require ROLE_USER for only this controller method.
	*	@Route("/create", name="post.create")
	* 	@return Response
	*/
	public function create(): Response
	{
		$post = new Post();
		$form = $this->createForm(PostType::class, $post);

		return $this->twig->render('pages/create.html.twig', [
			'post' => $post,
			'form' => $form->createView(),
		]);
	}

	/**
	*	@Route("/{slug}-{id}", name="post.display", requirements={"slug": "[a-z0-9\-]*"})
	* 	@return Response
	*/
	public function display(Post $post, string $slug): Response
	{

		if($post->getSlug() !== $slug){

			return $this->redirectToRoute('post.display', [
				'id' => $post->getId(),
				'slug' => $post->getSlug()
			], 301);
		}
		return $this->render('pages/post.html.twig', [
			'post' => $post,
			'current_menu' => 'post'
		]);
	}
	/**
	*	@Route("/edit/{slug}-{id}", name="post.edit", requirements={"slug": "[a-z0-9\-]*"})
	*
	*
    * 	
    * 	@return Response
	*/
	public function edit(Post $post, string $slug): Response
	{

		// $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

		$form = $this->createForm(PostType::class, $post);
				dump($post);

		// $form->handleRequest($request);
		// if($form->isSubmitted() && $form->isValid())
		// {
		// 	$this->$em->flush();
		// 	return $this->redirectToRoute('pages/post.index.twig');

		// }

		return $this->render('pages/edit.html.twig', [
			'form' => $form->createView(),
			'post' => $post,
		]);

	}
}