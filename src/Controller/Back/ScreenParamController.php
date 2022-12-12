<?php

namespace App\Controller\Back;

use App\Entity\ScreenParam;
use App\Form\ScreenParamType;
use App\Repository\ScreenParamRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/back/screen/param')]
class ScreenParamController extends AbstractController
{
    #[Route('/', name: 'app_back_screen_param_index', methods: ['GET'])]
    public function index(ScreenParamRepository $screenParamRepository): Response
    {
        return $this->render('back/screen_param/index.html.twig', [
            'screen_params' => $screenParamRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_back_screen_param_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ScreenParamRepository $screenParamRepository): Response
    {
        $screenParam = new ScreenParam();
        $form = $this->createForm(ScreenParamType::class, $screenParam);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $screenParamRepository->save($screenParam, true);

            return $this->redirectToRoute('app_back_screen_param_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/screen_param/new.html.twig', [
            'screen_param' => $screenParam,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_back_screen_param_show', methods: ['GET'])]
    public function show(ScreenParam $screenParam): Response
    {
        return $this->render('back/screen_param/show.html.twig', [
            'screen_param' => $screenParam,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_back_screen_param_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ScreenParam $screenParam, ScreenParamRepository $screenParamRepository): Response
    {
        $form = $this->createForm(ScreenParamType::class, $screenParam);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $screenParamRepository->save($screenParam, true);

            return $this->redirectToRoute('app_back_screen_param_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/screen_param/edit.html.twig', [
            'screen_param' => $screenParam,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_back_screen_param_delete', methods: ['POST'])]
    public function delete(Request $request, ScreenParam $screenParam, ScreenParamRepository $screenParamRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$screenParam->getId(), $request->request->get('_token'))) {
            $screenParamRepository->remove($screenParam, true);
        }

        return $this->redirectToRoute('app_back_screen_param_index', [], Response::HTTP_SEE_OTHER);
    }
}
