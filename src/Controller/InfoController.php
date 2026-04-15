<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/info', name: 'info')]
class InfoController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function info(): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'InfoController/',
        ]);
    }

    #[Route('/aaa', name: 'aaa')]
    public function aaa(): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'InfoController/AAA',
        ]);
    }
}