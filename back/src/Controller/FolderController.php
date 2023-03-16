<?php

namespace App\Controller;

use App\Entity\Folder;
use App\Form\FolderType;
use App\Repository\FolderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/folder')]
class FolderController extends AbstractController
{
    #[Route('/', name: 'app_folder_index', methods: ['GET'])]
    public function index(FolderRepository $folderRepository): Response
    {
        return $this->render('folder/index.html.twig', [
            'folders' => $folderRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_folder_new', methods: ['GET', 'POST'])]
    public function new(Request $request, FolderRepository $folderRepository): Response
    {
        $folder = new Folder();
        $form = $this->createForm(FolderType::class, $folder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $folderRepository->save($folder, true);

            return $this->redirectToRoute('app_folder_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('folder/new.html.twig', [
            'folder' => $folder,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_folder_show', methods: ['GET'])]
    public function show(Folder $folder): Response
    {
        return $this->render('folder/show.html.twig', [
            'folder' => $folder,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_folder_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Folder $folder, FolderRepository $folderRepository): Response
    {
        $form = $this->createForm(FolderType::class, $folder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $folderRepository->save($folder, true);

            return $this->redirectToRoute('app_folder_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('folder/edit.html.twig', [
            'folder' => $folder,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_folder_delete', methods: ['POST'])]
    public function delete(Request $request, Folder $folder, FolderRepository $folderRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$folder->getId(), $request->request->get('_token'))) {
            $folderRepository->remove($folder, true);
        }

        return $this->redirectToRoute('app_folder_index', [], Response::HTTP_SEE_OTHER);
    }
}
