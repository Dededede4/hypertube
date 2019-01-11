<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

use App\Service\SearchTorrentManager;

use App\Service\TorrentManager;

use App\Entity\Video;

class DownloadController extends AbstractController
{
    /**
     * @Route("/download/{video}", name="download")
     */
    public function downloadAction(Video $video, TorrentManager $manager)
    {
        $manager->download($video);
        return new JsonResponse(['response' => 'ok']);
    }
}