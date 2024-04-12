<?php

namespace App\Controller;

use App\Repository\NewzRepository;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(NewzRepository $newzRepository, ArticleRepository $articleRepository): Response
    {
        $newzs = $newzRepository->findAll();
        $articles = $articleRepository->findAll();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'newzs' => $newzs,
            'articles' => $articles,
        ]);
    }
}