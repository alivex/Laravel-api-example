<?php

namespace App\Extractors;

class LinkCountExtractor
{
    public function extract($crawler)
    {
        $curr_url = $this->get_domain($crawler->getUri());

        $external = $crawler->filterXPath(
            '//a[not(contains(@href, "' . $curr_url . '") or @href ="/")]/@href'
            )->count();

        $internal = $crawler->filterXPath(
            '//a[(contains(@href, "' . $curr_url . '") or @href = "/")]/@href'
            )->count();

        return collect([
            "external" => $external,
            "internal" => $internal
        ]);
    }

    private function get_domain($url)
    {
        $matches = [];
        preg_match('/([a-z0-9|-]+\.)*[a-z0-9|-]+\.[a-z]+/', $url, $matches);
        return $matches[0];
    }
}
