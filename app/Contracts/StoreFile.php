<?php

declare(strict_types=1);

namespace Brewmap\Contracts;

use Illuminate\Http\UploadedFile;

interface StoreFile
{
    public function storeFile(string $uploadFolder, UploadedFile $file);
}
