<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {

    #[Route('/', name: 'index')]
    public function index(MediaNewsController $mediaData, CatcherNewsController $catcherData): Response {
        return $this->render('news/index.html.twig', [
            'mediaApi' => $mediaData->getData(),
            'catcherApi' => $catcherData->getData(),
            'id' => 0,
        ]);
    }
}
