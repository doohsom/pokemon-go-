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
        Schema::create('pokemon_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pokemon_id');
            $table->foreignId('stat_id');
            $table->integer('base_stat');
            $table->integer('effort');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemon_stats');
    }
};
