<?php

namespace App\Service;

use Symfony\Component\DomCrawler\Crawler;

use App\Entity\Video;
use Transmission\Transmission;

class TorrentManager
{
	public function download($video)
	{
		$torrentFile = file_get_contents($video->getTorrentUrl());
		$filePath = '/tmp/'.$video->getUuid();
		file_put_contents($filePath, $torrentFile);
		$transmission = new Transmission();
		$transmission->add($filePath);
	}
}