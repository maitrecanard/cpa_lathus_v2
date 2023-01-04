<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_front_main')]
    public function index(): Response
    {
            if($this->getUser())
            {
                return $this->redirectToRoute('app_back_main');
            }

            return $this->redirectToRoute('login');
        
    }
}
