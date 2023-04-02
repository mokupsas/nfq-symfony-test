<?php

namespace App\Controller;

use App\Common\SortArticles;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class IndexController extends AbstractController
{
    public function __construct(Environment $twig)
    {
        $twig->addFunction(new \Twig\TwigFunction('readTime','App\Common\Algo::countArticleReadTime'));
    }

    #[Route('/', name: 'home')]
    public function list(ArticleRepository $articleRepository): Response
    {
        return $this->render('pages/index.html.twig', [
            'articles' => SortArticles::sortByUpdatedAt( $articleRepository->findAll() )
        ]);
    }
}
