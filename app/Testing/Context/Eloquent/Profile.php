<?php

declare(strict_types=1);

namespace Brewmap\Testing\Context\Eloquent;

use Behat\Behat\Context\Context;
use Illuminate\Http\Testing\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Profile implements Context
{
    public function __construct()
    {
        Storage::fake("avatars");
    }
    /**
     * @Given a user is uploading avatar file
     */
    public function aUserIsUploadingAvatarFile(): void
    {
        dd(UploadedFile::fake()->image("avatar.jpg"));

        // Assert the file was stored...
        Storage::disk("avatars")->assertExists("avatar.jpg");
    }
}
