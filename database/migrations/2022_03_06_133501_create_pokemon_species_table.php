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
        Schema::create('pokemon_species', function (Blueprint $table) {
//            id,identifier,generation_id,evolves_from_species_id,evolution_chain_id,color_id,shape_id,
//habitat_id,gender_rate,capture_rate,base_happiness,is_baby,hatch_counter,has_gender_differences,growth_rate_id,
//forms_switchable,is_legendary,is_mythical,order,conquest_order

            $table->string('id');
            $table->string('identifier');
            $table->integer('generation_id')->nullable();
            $table->integer('evolves_from_species_id')->nullable();
            $table->integer('evolution_chain_id')->nullable();
            $table->integer('color_id')->nullable();
            $table->integer('shape_id')->nullable();
            $table->integer('habitat_id')->nullable();
            $table->integer('gender_rate')->nullable();
            $table->integer('capture_rate')->nullable();
            $table->integer('base_happiness')->nullable();
            $table->integer('is_baby')->nullable();
            $table->integer('hatch_counter')->nullable();
            $table->integer('has_gender_differences')->nullable();
            $table->integer('growth_rate_id')->nullable();
            $table->integer('forms_switchable')->nullable();
            $table->integer('is_legendary')->nullable();
            $table->integer('is_mythical')->nullable();
            $table->integer('order')->nullable();
            $table->integer('conquest_order')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemon_species');
    }
};
