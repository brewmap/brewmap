<?php

declare(strict_types=1);

namespace Brewmap\Services;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
class StoreFileService
{
    protected UploadedFile $file;
    protected string $path;

    public function __construct(Request $request)
    {
        $this->file = $request->file("file");
    }

    /**
     * @return string
+   */
    public function storeFile(string $uploadFolder): string
    {
        $this->path = $this->file->store($uploadFolder);

        return $this->path;
    }
}
