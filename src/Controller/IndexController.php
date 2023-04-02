<?php

namespace App\Controller;

use App\Sort\SortArticles;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function list(ArticleRepository $articleRepository): Response
    {
        return $this->render('pages/index.html.twig', [
            'articles' => SortArticles::sortByUpdatedAt( $articleRepository->findAll() )
        ]);
    }
}
