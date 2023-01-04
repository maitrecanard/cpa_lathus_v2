<?php

namespace App\Controller\Install;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ExploitantRepository;
use App\Entity\Exploitant;
use App\Entity\User;
use App\Form\ExploitantType;
use App\Repository\UserRepository;

class InstallerController extends AbstractController
{
    #[Route('/install', name: 'app_install')]
    public function new(Request $request, ExploitantRepository $exploitantRepository, UserRepository $userRepository): Response
    {
        $exploitant = new Exploitant();
                    $user = new User();
        $form = $this->createForm(ExploitantType::class, $exploitant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = new User();
            $user->getRoles(["ROLE_SUPERADMIN"]);
            $exploitantRepository->save($exploitant, true);
            $userRepository->save($user, true);
            return $this->redirectToRoute('app_login', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/exploitant/new.html.twig', [
            'exploitant' => $exploitant,
            'form' => $form,
        ]);
    }
}
