<?php

namespace App\Controller;

use App\Entity\Newz;
use App\Form\NewzType;
use App\Form\NewzEditType;
use App\Repository\NewzRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

#[Route('/newz')]
class NewzController extends AbstractController
{
    #[Route('/', name: 'app_newz_index', methods: ['GET'])]
    public function index(NewzRepository $newzRepository): Response
    {
        return $this->render('newz/index.html.twig', [
            'newzs' => $newzRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_newz_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $newz = new Newz();
        $form = $this->createForm(NewzType::class, $newz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if necessary
                }

                $newz->setImage($newFilename);
            }
            
            $entityManager->persist($newz);
            $entityManager->flush();

            return $this->redirectToRoute('app_newz_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('newz/new.html.twig', [
            'newz' => $newz,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_newz_show', methods: ['GET'])]
    public function show(Newz $newz): Response
    {
        return $this->render('newz/show.html.twig', [
            'newz' => $newz,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_newz_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Newz $newz, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(NewzEditType::class, $newz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if necessary
                }

                $newz->setImage($newFilename);
            }
            
            $entityManager->flush();

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('newz/edit.html.twig', [
            'newz' => $newz,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_newz_delete', methods: ['POST'])]
    public function delete(Request $request, Newz $newz, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$newz->getId(), $request->request->get('_token'))) {
            $entityManager->remove($newz);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_newz_index', [], Response::HTTP_SEE_OTHER);
    }
   
}