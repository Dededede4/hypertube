<?php

namespace App\Service;

use Symfony\Component\DomCrawler\Crawler;

class SearchTorrentManager
{
    /*public function __construct(MessageGenerator $messageGenerator, \Swift_Mailer $mailer)
    {
        $this->messageGenerator = $messageGenerator;
        $this->mailer = $mailer;
    }*/

    public function __construct()
    {

    }

    public function search($query)
    {
        $url = 'http://www.legittorrents.info/index.php?search='.$query.'&page=torrents&category=1&active=1';

        $html = file_get_contents($url);

        $crawler = new Crawler($html);

        $crawler = $crawler->filterXPath('//td[@valign=\'middle\']/a');

        // We get the names and urls
        $results = [];
        foreach ($crawler as $domElement) {
            if (is_null($domElement))
                continue;
            $results[] = [
                'url' => $domElement->getAttribute('href'),
                'name' => $domElement->nodeValue,
            ];
        }

        // We get the rest of the stuff.
        foreach ($results as &$value) {
            $html = file_get_contents('http://www.legittorrents.info/'.$value['url']);
            
            $crawler = new Crawler($html);
            $crawler = $crawler->filterXPath('//tr');

            foreach ($crawler as $domElement) {
                if (is_null($domElement))
                {
                    var_dump('is_null');
                    continue;
                }
                if ($domElement->childNodes[0]->nodeValue == 'Description')
                {
                    $value['description'] = $domElement->childNodes[2]->nodeValue;
                }   
            }
        }
        return $results;
    }
}
