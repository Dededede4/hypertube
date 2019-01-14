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
        $returnValues = [];

        $videos = $manager->search($query);

        $entityManager = $this->getDoctrine()->getManager();
        foreach ($videos as $video) {
            $entityManager->merge($video);
        }
        $entityManager->flush();

        foreach ($videos as $video) {
            $selectedValues = [
                'title' => $video->getTitle(),
                'btih' => $video->getBtih(),
            ];
            $returnValues[] = $selectedValues;
        }
        return new JsonResponse($returnValues);
    }
}