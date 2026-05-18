<?php

namespace App\Controller;

use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PostController extends AbstractController
{
    #[Route('/posts', name: 'post_list')]
    public function list(EntityManagerInterface $entityManager): Response
    {
        $posts = $entityManager->getRepository(Post::class)->findByTitleSQL('Title');

        return $this->render('post/list.html.twig', [
            'posts' => $posts,
        ]);
    }

    #[Route('/post/create', name: 'post_create')]
    public function create(EntityManagerInterface $entityManager): Response
    {
        $post = new Post('Tytuł', 'Treść');
        $entityManager->persist($post);
        $entityManager->flush();
        return $this->redirectToRoute('post_list');
    }
}