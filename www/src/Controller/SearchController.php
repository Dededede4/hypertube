<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Service\SearchTorrentManager;

class SearchController extends AbstractController
{
    private $searchTorrentManager;

    public function __construct(SearchTorrentManager $manager)
    {
        $this->searchTorrentManager = $manager;
    }

    /**
     * @Route("/search/{query}.json", name="search_json")
     * @Security("is_granted('ROLE_USER')")
     */
    public function searchJsonAction($query)
    {
        $returnValues = [];

        $videos = $this->searchAndFlush($query);

        foreach ($videos as $video) {
            $selectedValues = [
                'title' => $video->getTitle(),
                'btih' => $video->getBtih(),
            ];
            $returnValues[] = $selectedValues;
        }
        return new JsonResponse($returnValues);
    }

    /**
     * @Route("/search/", name="search")
     * @Security("is_granted('ROLE_USER')")
     */
    public function searchAction(Request $request)
    {
        $returnValues = [];
        
        $videos = $this->searchAndFlush($request->query->get('s'));

        return $this->render(
            'Search/index.html.twig',
            ['videos' => $videos]
        );
    }

    private function searchAndFlush($query)
    {
        $videos = $this->searchTorrentManager->search($query);

        $entityManager = $this->getDoctrine()->getManager();
        foreach ($videos as $video) {
            $entityManager->merge($video);
        }
        $entityManager->flush();

        return $videos;
    }
}