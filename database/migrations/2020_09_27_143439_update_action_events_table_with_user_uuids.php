<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Nova\Actions\ActionEvent;

class UpdateActionEventsTableWithUserUuids extends Migration
{
    public function up(): void
    {
        Schema::table(
            "action_events",
            function (Blueprint $table): void {
                $table->uuid("user_id")->change();
                $table->uuid("actionable_id")->change();
                $table->uuid("target_id")->change();
                $table->uuid("model_id")->change();
            }
        );
    }

    public function down(): void
    {
        ActionEvent::query()->delete();
        Schema::table(
            "action_events",
            function (Blueprint $table): void {
                $table->unsignedBigInteger("user_id")->change();
                $table->unsignedBigInteger("actionable_id")->change();
                $table->unsignedBigInteger("target_id")->change();
                $table->unsignedBigInteger("model_id")->change();
            }
        );
    }
}
