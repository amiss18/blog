<?php

namespace App\Controller;

use Twig\Environment;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{

	/**
	*	@var Environment
	**/
	private $twig;

	public function __construct(Environment $twig)
	{
		$this->twig = $twig;

	}

	/**
+      * Require ROLE_USER for only this controller method.
+      * @Route("/dashboard.php", name="dashboard")
+      */
	public function dashboard(): Response
	{
		

		return $this->render('pages/dashboard.html.twig');
	}
}