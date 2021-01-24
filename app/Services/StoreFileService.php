<?php

declare(strict_types=1);

namespace Brewmap\Services;

use Brewmap\Contracts\StoreFile;
use Illuminate\Http\UploadedFile;

/**
 * @psalm-suppress MissingConstructor
 */
class StoreFileService implements StoreFile
{
    protected string $path;

    /**
     * @return string
+   */
    public function storeFile(string $uploadFolder, UploadedFile $file): string
    {
        $this->path = $file->store($uploadFolder);

        return $this->path;
    }
}
