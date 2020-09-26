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
        Schema::table(
            "users",
            function (Blueprint $table): void {
                $table->string("password")->nullable()->change();
                $table->string("facebook_id")->nullable();
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
                $table->dropColumn("facebook_id");
            }
        );
    }
}
