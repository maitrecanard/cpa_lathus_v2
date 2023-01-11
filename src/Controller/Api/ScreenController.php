<?php

namespace App\Controller\Api;

use App\Repository\ScreenContentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ScreenController extends AbstractController
{
    #[Route('/api/screen', name: 'api_screen', methods:['get'])]
    public function index(ScreenContentRepository $screenContentRepository): JsonResponse
    {
        header("Access-Control-Allow-Origin: *");
        $screens = $screenContentRepository->findBy(['activ'=>1]);

        if(!$screens) {
           
            return $this->json([
                'screens' => 'Aucun écran paramétré'
            ,'status' => Response::HTTP_NO_CONTENT ]);
            
        }
        dd($screens);
        return $this->json(
           $screens
        , Response::HTTP_OK, [],['groups'=>'screnn_api']);

    }
}
