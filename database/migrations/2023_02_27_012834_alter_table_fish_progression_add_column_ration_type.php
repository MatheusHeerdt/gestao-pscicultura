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
            $table->integer('ration_type')->default(1);
            $table->float('daily_total')->change();
            $table->float('meal_total')->change();
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
            $table->dropColumn('ration_type');
            $table->integer('daily_total')->change();
            $table->integer('meal_total')->change();
        });
    }
};
