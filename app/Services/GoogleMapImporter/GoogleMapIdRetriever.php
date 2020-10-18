<?php

declare(strict_types=1);

namespace Brewmap\Services\GoogleMapImporter;

class GoogleMapIdRetriever
{
    public function get(string $mapUrl): string
    {
        parse_str($mapUrl, $query);
        return $query["mid"];
    }
}
