<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fish_progression', function (Blueprint $table) {
            $table->foreign(['user_id'])->references('id')->on('users');
            $table->foreign(['tank_id'])->references('id')->on('tanks');
            $table->foreign(['fish_id'])->references('id')->on('fish');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fish_progression', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['tank_id']);
            $table->dropForeign(['fish_id']);
        });
    }
};