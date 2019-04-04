<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class UserController extends AbstractController
{
    /**
    *   @Route("/user", name="user.index")
    *   @return Response
    */
    
    /*public function index(): Response
    {
        $user = new User();
        $user->setUsername('Antoine')
            ->setRoles(['ROLE_USER'])
            ->setPassword('$2y$10$UertVsthCgw.hJkttZoMbO27Xk30VJlEm.8ofQIAV0GE21.0ONaB2');
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        
        return $this->render('admin/user.html.twig', [
            'current_user' => 'user'
            ]);
    }*/
}
