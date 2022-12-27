<?php

namespace App\Controller\Back;

use App\Repository\ScreenContentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MainController extends AbstractController
{
    #[Route('/', name: 'app_back_main', methods:['GET'])]
    public function index(ScreenContentRepository $screenContentRepository): Response
    {
        $activ = $screenContentRepository->findBy(['activ' => 1]);
        $inactiv = $screenContentRepository->findBy(['activ' => 0]);
        $screenActiv = count($activ);
        $screenInactiv = count($inactiv);
        return $this->render('back/main/index.html.twig', [
            'screenactive' => $screenActiv,
            'screeninactive' => $screenInactiv,
        ]);
    }
}
