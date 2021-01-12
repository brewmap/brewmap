<?php

declare(strict_types=1);

namespace Brewmap\Services;

use Illuminate\Http\Request;

class StoreFileService
{
    protected $pathToFile;
    protected $file;

    public function __construct(Request $request)
    {
        $this->file = $request->file("file");
    }

    public function storeFile(string $uploadFolder)
    {
        $this->path = $this->file->store($uploadFolder, "public");
        return $this->path;
    }
}
