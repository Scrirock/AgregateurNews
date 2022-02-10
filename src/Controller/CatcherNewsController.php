<?php

namespace App\Controller;

use App\Service\NewsAgregator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/catcher', name: 'catcher_')]
class CatcherNewsController extends AbstractController
{
    private $catcherApi;

    public function __construct(NewsAgregator $newsAgregator) {
        $this->catcherApi = $newsAgregator->getCatcherNews();
    }

    #[Route('/{id<\d+>}', name: 'unique')]
    public function uniqueNews(int $id): Response {
        return $this->render('catcher_news/uniqueNews.html.twig', [
            'data' => $this->catcherApi[$id],
        ]);
    }

    public function getData() {
        return $this->catcherApi;
    }
}
