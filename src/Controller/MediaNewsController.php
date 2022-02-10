<?php

namespace App\Controller;

use App\Service\NewsAgregator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/media', name: 'media_')]
class MediaNewsController extends AbstractController {

    private $mediaApi;

    public function __construct(NewsAgregator $newsAgregator) {
        $this->mediaApi = $newsAgregator->getMediaNews();
    }

    #[Route('/{id<\d+>}', name: 'unique')]
    public function uniqueNews(int $id): Response {
        return $this->render('news/uniqueNews.html.twig', [
            'data' => $this->mediaApi[$id],
        ]);
    }

    public function getData() {
        return $this->mediaApi;
    }
}
