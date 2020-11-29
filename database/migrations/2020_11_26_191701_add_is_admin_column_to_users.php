<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsAdminColumnToUsers extends Migration
{
    public function up(): void
    {
        Schema::table("users", function (Blueprint $table): void {
            $table->boolean("is_admin")->default(false);
        });
    }

    public function down(): void
    {
        Schema::table("users", function (Blueprint $table): void {
            $table->dropColumn("is_admin");
        });
    }
}
