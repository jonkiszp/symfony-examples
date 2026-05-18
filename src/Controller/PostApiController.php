<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path:"api/post")]
class PostApiController extends AbstractController {
    
    #[Route(path:"/", name:"api_post_list", methods: ["GET"])]
    public function index(PostRepository $postRepository): JsonResponse {
        return $this->json($postRepository->findAll());
    }

    #[Route(path:"/search/{title}", name:"api_post_list_search_title", methods: ['GET'])]
    public function searchTitle(string $title, PostRepository $postRepository): JsonResponse {
        return $this->json($postRepository->findByTitleDQL($title));
    }
}