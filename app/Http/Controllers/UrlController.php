<?php

namespace App\Http\Controllers;

use App\UrlData;
use Goutte;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function store(Request $request)
    {

        $crawler = Goutte::request('GET', $request->input('url'));

        $title = UrlData::extractTitle($crawler);
        $links = UrlData::extractLinksCount($crawler);

        $urldata = UrlData::create([
            'url' => $request->input('url'),
            'title' => $title,
            'internal_links' => $links["internal"],
            'external_links' => $links["external"]
        ]);

        return response()->json($urldata, 201);
    }
}
