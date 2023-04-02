<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;


class EditController extends AbstractController
{
    public function __construct(Environment $twig)
    {
        $twig->addFunction(new \Twig\TwigFunction('readTime','App\Common\Algo::countArticleReadTime'));
    }

    #[Route('/edit/{id}', name: 'article_edit')]
    public function view(Article $article, Request $request, EntityManagerInterface $entityManager): Response
    {
        $notification = null;

        $form = $this->createFormBuilder($article)
            ->add('title', TextType::class)
            ->add('text', TextareaType::class)
            ->add('image', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Edit'])
            ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $notification = 'Successfully edited!';
            }

        return $this->render('pages/edit.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
            'notification' => $notification
        ]);
    }
}
