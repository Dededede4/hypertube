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
        return array_merge($this->searchArchiveOrg($query), $this->searchLegitTorrent($query));
    }

    public function searchLegitTorrent($query)
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

    public function searchArchiveOrg($query)
    {
        $url = 'https://archive.org/advancedsearch.php?q=mediatype%3Atexts+'.$query.'&fl%5B%5D=avg_rating&fl%5B%5D=backup_location&fl%5B%5D=btih&fl%5B%5D=call_number&fl%5B%5D=collection&fl%5B%5D=contributor&fl%5B%5D=coverage&fl%5B%5D=creator&fl%5B%5D=date&fl%5B%5D=description&fl%5B%5D=downloads&fl%5B%5D=external-identifier&fl%5B%5D=foldoutcount&fl%5B%5D=format&fl%5B%5D=genre&fl%5B%5D=headerImage&fl%5B%5D=identifier&fl%5B%5D=imagecount&fl%5B%5D=indexflag&fl%5B%5D=item_size&fl%5B%5D=language&fl%5B%5D=licenseurl&fl%5B%5D=mediatype&fl%5B%5D=members&fl%5B%5D=month&fl%5B%5D=name&fl%5B%5D=noindex&fl%5B%5D=num_reviews&fl%5B%5D=oai_updatedate&fl%5B%5D=publicdate&fl%5B%5D=publisher&fl%5B%5D=related-external-id&fl%5B%5D=reviewdate&fl%5B%5D=rights&fl%5B%5D=scanningcentre&fl%5B%5D=source&fl%5B%5D=stripped_tags&fl%5B%5D=subject&fl%5B%5D=title&fl%5B%5D=type&fl%5B%5D=volume&fl%5B%5D=week&fl%5B%5D=year&sort%5B%5D=titleSorter+asc&sort%5B%5D=&sort%5B%5D=&rows=10&page=1&output=json&save=yes#raw';
        $results = json_decode(file_get_contents($url), true);
        
        // Check if result is empty
        $results = $results['response']['docs'];
        return $results;
    }
}
