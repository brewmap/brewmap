<?php

declare(strict_types=1);

namespace Brewmap\Console\Commands;

use Brewmap\Services\GoogleMapImporter\GoogleMapIdRetriever;
use Brewmap\Services\GoogleMapImporter\MapFolderRetriever;
use DOMElement;
use Illuminate\Console\Command;
use League\CLImate\CLImate;
use RuntimeException;
use Symfony\Component\Config\Util\Exception\InvalidXmlException;
use Symfony\Component\Config\Util\Exception\XmlParsingException;

class ImportGoogleMap extends Command
{
    protected $signature = "import:google {url}";

    /**
     * @throws InvalidXmlException
     * @throws RuntimeException
     * @throws XmlParsingException
     */
    public function handle(CLImate $cli, GoogleMapIdRetriever $idRetriever, MapFolderRetriever $folderRetriever): void
    {
        $id = $idRetriever->get($this->argument("url"));
        $folders = $folderRetriever->getFolders($id);

        $input = $cli->checkboxes("Select folders to import", $folderRetriever->getFolderNames($folders));
        $selected = $input->prompt();

        foreach ($folders as $folder) {
            if (in_array($folder->getElementsByTagName("name")[0]->nodeValue, array_values($selected), true)) {
                /** @var DOMElement $place */
                foreach ($folder->getElementsByTagName("Placemark") as $place) {
                    echo $place->getElementsByTagName("name")[0]->nodeValue . PHP_EOL;
                }
            }
        }
    }
}
