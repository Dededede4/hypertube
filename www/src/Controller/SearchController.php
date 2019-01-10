<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

use App\Service\SearchTorrentManager;

class SearchController extends AbstractController
{
    /**
     * @Route("/search/{query}", name="search")
     */
    public function searchAction($query, SearchTorrentManager $manager)
    {
        $value = $manager->search($query);
        return new JsonResponse($value);
    }
}