<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class ViewController extends AbstractController
{
    public function __construct(Environment $twig)
    {
        $twig->addFunction(new \Twig\TwigFunction('readTime','App\Common\Algo::countArticleReadTime'));
    }

    #[Route('/article/{id}', name: 'article_view')]
    public function view(Article $article): Response
    {
        return $this->render('pages/view.html.twig', [
            'article' => $article,
        ]);
    }
}
