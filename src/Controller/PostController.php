<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PostController extends AbstractController
{
    #[Route('/posts', name: 'post_list')]
    public function list(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findByTitleDQL('Title');

        return $this->render('post/list.html.twig', [
            'posts' => $posts,
        ]);
    }

    #[Route('/post/create', name: 'post_create')]
    public function create(PostRepository $postRepository): Response
    {
        $post = new Post('Tytuł', 'Treść');
        $postRepository->add($post);
        $postRepository->save();
        return $this->redirectToRoute('post_list');
    }
}