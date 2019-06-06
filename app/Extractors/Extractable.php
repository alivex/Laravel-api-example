<?php

namespace App\Extractors;

use App\Extractors\TitleExtractor;
use App\Extractors\LinkCountExtractor;

use Goutte;

trait Extractable
{

    public static function extractTitle($crawler)
    {
        return (new TitleExtractor($crawler))->extract($crawler);
    }

    public static function extractLinksCount($crawler)
    {
        return (new LinkCountExtractor($crawler))->extract($crawler);
    }

}
