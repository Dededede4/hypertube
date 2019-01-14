<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;

use App\Service\SearchTorrentManager;

use App\Service\TorrentManager;

use App\Entity\Video;




class DownloadController extends AbstractController
{
    /**
     * @Route("/stream/{video}", name="stream")
     */
    public function downloadAction(Video $video, TorrentManager $manager)
    {
        $manager->download($video);
        return new RedirectResponse('/download/stream/'.$video->getBtih().'.mp4');
    }
}