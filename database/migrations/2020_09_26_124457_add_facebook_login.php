<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFacebookLogin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
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
     *
     * @return void
     */
    public function down()
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
