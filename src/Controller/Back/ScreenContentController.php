<?php

namespace App\Controller\Back;

use App\Entity\ScreenContent;
use App\Entity\ScreenParam;
use App\Form\ScreenContentType;
use App\Repository\ScreenParamRepository;
use App\Repository\ScreenContentRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin')]
class ScreenContentController extends AbstractController
{
    #[Route('/screencontent', name: 'app_back_screen_content_index', methods: ['GET'])]
    public function index(ScreenContentRepository $screenContentRepository): Response
    {
        return $this->render('back/screen_content/index.html.twig', [
            'screen_contents' => $screenContentRepository->findAll(),
        ]);
    }

    #[Route('/screencontent/selectparam', name:'screen_param_select', methods:['GET'])]
    public function select(ScreenParamRepository $screenParamRepository)
    {
        $screen = $screenParamRepository->findAll();

        return $this->render('back/screen_content/select.html.twig', [
            'param' => $screen
        ]);
    }

    #[Route('/screencontent/{id}/new', name: 'app_back_screen_content_new', methods: ['GET', 'POST'])]
    public function new(ScreenParam $screenParam, Request $request, ScreenContentRepository $screenContentRepository): Response
    {
        $screenContent = new ScreenContent();
        $form = $this->createForm(ScreenContentType::class, $screenContent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $screenContentRepository->save($screenContent, true);

            return $this->redirectToRoute('app_back_screen_content_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/screen_content/new.html.twig', [
            'screen_content' => $screenContent,
            'form' => $form,
        ]);
    }

    #[Route('/screencontent/{id}', name: 'app_back_screen_content_show', methods: ['GET'])]
    public function show(ScreenContent $screenContent): Response
    {
        return $this->render('back/screen_content/show.html.twig', [
            'screen_content' => $screenContent,
        ]);
    }

    #[Route('/screencontent/{id}/edit', name: 'app_back_screen_content_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ScreenContent $screenContent, ScreenContentRepository $screenContentRepository): Response
    {
        $form = $this->createForm(ScreenContentType::class, $screenContent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $screenContentRepository->save($screenContent, true);

            return $this->redirectToRoute('app_back_screen_content_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/screen_content/edit.html.twig', [
            'screen_content' => $screenContent,
            'form' => $form,
        ]);
    }

    #[Route('/screencontent/{id}/delete', name: 'app_back_screen_content_delete', methods: ['POST'])]
    public function delete(Request $request, ScreenContent $screenContent, ScreenContentRepository $screenContentRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$screenContent->getId(), $request->request->get('_token'))) {
            $screenContentRepository->remove($screenContent, true);
        }

        return $this->redirectToRoute('app_back_screen_content_index', [], Response::HTTP_SEE_OTHER);
    }
}
