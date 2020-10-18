<?php

declare(strict_types=1);

namespace Brewmap\Services\GoogleMapImporter;

use DOMElement;
use Illuminate\Http\Client\Factory;
use RuntimeException;
use Symfony\Component\Config\Util\Exception\InvalidXmlException;
use Symfony\Component\Config\Util\Exception\XmlParsingException;
use Symfony\Component\Config\Util\XmlUtils;

class MapFolderRetriever
{
    protected const FOLDER_NODE_TAG = "Folder";
    protected const FOLDER_NAME_NODE_TAG = "name";

    protected Factory $http;

    public function __construct(Factory $http)
    {
        $this->http = $http;
    }

    /**
     * @throws InvalidXmlException
     * @throws RuntimeException
     * @throws XmlParsingException
     */
    public function getFolders(string $id): array
    {
        $response = $this->http->get("https://www.google.com/maps/d/u/0/kml?mid=${id}&forcekml=1");
        $body = $response->body();

        $document = XmlUtils::parse($body);
        $folders = [];

        /** @var DOMElement $folder */
        foreach ($document->getElementsByTagName(static::FOLDER_NODE_TAG) as $folder) {
            $folders[] = $folder;
        }

        return $folders;
    }

    public function getFolderNames(array $folders): array
    {
        $names = [];

        /** @var DOMElement $folder */
        foreach ($folders as $folder) {
            $names[] = $folder->getElementsByTagName(static::FOLDER_NAME_NODE_TAG)[0]->nodeValue;
        }

        return $names;
    }
}
