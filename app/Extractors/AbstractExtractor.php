<?php


namespace App\Extractors;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

abstract class AbstractExtractor
{
    protected $request;

    protected $extractors = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function extract($query)
    {

        foreach ($this->getExtractors() as $extractor => $value) {
            $this->resolveExtractor($extractor)->extract($query, $value);
        }
        return $query;
    }

    protected function getExtractors()
    {
        return array_extract($this->request->only(array_keys($this->extractors)));
    }

    protected function resolveExtractor($extractor)
    {
        return new $this->extractors[$extractor];
    }
}
