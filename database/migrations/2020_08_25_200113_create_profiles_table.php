<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    public function up(): void
    {
        Schema::create(
            "profiles",
            function (Blueprint $table): void {
                $table->uuid("user_id")->primary();
                $table->foreign("user_id")->references("id")->on("users");

                $table->string("public_name")->default("");
                $table->string("avatar_path")->default("");
                $table->date("birthday")->nullable()->default(null);
                $table->timestamps();
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists("profiles");
    }
}
