<?php

namespace App;

use App\Extractors\Extractable;

use Illuminate\Database\Eloquent\Model;

class UrlData extends Model
{
    use Extractable;

    protected $fillable = ['url', 'title', 'internal_links', 'external_links'];

}
