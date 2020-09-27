<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFacebookLogin extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(
            "social_profiles",
            function (Blueprint $table): void {
                $table->uuid("user_id")->primary();
                $table->foreign("user_id")->references("id")->on("users");
                $table->string("facebook_id")->nullable();
                $table->timestamps();
            }
        );

        Schema::table(
            "users",
            function (Blueprint $table): void {
                $table->string("password")->nullable()->change();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(
            "users",
            function (Blueprint $table): void {
                $table->string("password")->change();
            }
        );
        Schema::table(
            "social_profiles",
            function (Blueprint $table): void {
                $table->dropForeign(["user_id"]);
            }
        );
        Schema::dropIfExists("social_profiles");
    }
}
