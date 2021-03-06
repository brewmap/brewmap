<?php

declare(strict_types=1);

namespace Brewmap\Services\Profile;

use Brewmap\Contracts\StoreFile;
use Illuminate\Http\UploadedFile;

class StoreFileService implements StoreFile
{
    protected string $path;

    public function storeFile(string $uploadFolder, UploadedFile $file): string
    {
        $this->path = $file->store($uploadFolder);

        return $this->path;
    }
}
