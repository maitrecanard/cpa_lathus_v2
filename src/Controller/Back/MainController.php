<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class MainController extends AbstractController
{
    #[Route('/dashboard', name: 'app_back_main', methods:['GET'])]
    public function index(): Response
    {
        return $this->render('back/main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
