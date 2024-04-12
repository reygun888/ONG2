<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{   
    #[Route('/article', name: 'index_article')]
    public function index(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findAll();
        return $this->render('article/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    #[Route('/article/tab', name: 'tab_article')]
    public function tabBord(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findAll();
        return $this->render('article/tabBord.html.twig', [
            'articles' => $articles,
        ]);
    }

    #[Route('/article/{id}', name: 'show_article')]
    public function show(Article $article): Response
    {
        return $this->render('article/show.html.twig', [
            'article' => $article,
        ]);
    }

    

    #[Route("/new", name: "new_article")]
    public function new_article(Request $request, EntityManagerInterface $em, SluggerInterface $slugger): Response
    {
        $data = [];
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);

        $data["form"] = $form;

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

                $article->setImage($newFilename);
            }
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('app_user_index');
           
            
        }

        return $this->render("article/new_article.html.twig", $data);
    }

    #[Route("/update/{id}", name: "update_article")]
    public function update(int $id, ArticleRepository $articleRepository, Request $request, EntityManagerInterface $em)
    {
        $article = $articleRepository->findOneBy(["id" => $id]);
        $form = $this->createForm(ArticleType::class, $article, ["label" => "modifier"]);

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

                $article->setImage($newFilename);
            }
            $em->persist($article);
            $em->flush();
            return $this->redirectToRoute("app_user_index");
        }

        return $this->render("article/update_article.html.twig", [
            "article" => $article,
            "form" => $form,
        ]);
    }

    #[Route("/delete/{id}", name: "delete_article")]
    public function delete(EntityManagerInterface $em, ArticleRepository $articleRepository, int $id)
    {
        $article = $articleRepository->FindOneBy(["id" => $id]);
        $em->remove($article);
        $em->flush();
        return $this->redirectToRoute("app_user_index");
    }

    #[Route('/actualites', name: 'actualites')]
    public function actualites(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findAll();

        return $this->render('article/actualites.html.twig', [
            'articles' => $articles,
        ]);
    }

}