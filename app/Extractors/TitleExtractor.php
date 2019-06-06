<?php

namespace App\Extractors;

class TitleExtractor
{

    public function extract($crawler)
    {
        $title = $crawler->filterXPath('//head/title')->text();
        
        return $title;

    }
}