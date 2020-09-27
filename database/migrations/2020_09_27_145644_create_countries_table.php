<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    public function up(): void
    {
        Schema::create(
            "countries",
            function (Blueprint $table): void {
                $table->uuid("id")->primary();
                $table->string("slug")->unique();
                $table->string("name");
                $table->string("code");
                $table->timestamps();
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists("countries");
    }
}
