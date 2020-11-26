<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeActionEventIdsToUuids extends Migration
{
    public function up(): void
    {
        Schema::table("action_events", function (Blueprint $table): void {
            $table->string("actionable_id", 36)->change();
            $table->string("model_id", 36)->change();
            $table->string("target_id", 36)->change();
            $table->string("user_id", 36)->change();
        });
    }

    public function down(): void
    {
        Schema::table("action_events", function (Blueprint $table): void {
            $table->integer("actionable_id")->unsigned()->change();
            $table->integer("model_id")->unsigned()->change();
            $table->integer("target_id")->unsigned()->change();
            $table->integer("user_id")->unsigned()->change();
        });
    }
}
