<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Jointure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('optionsSalles', function (Blueprint $table) {
            $table->bigInteger('id_salles')->unsigned();
            $table->bigInteger('id_options')->unsigned();
            $table->foreign('id_salles')->references('id')->on('salles');
            $table->foreign('id_options')->references('id')->on('options');
            $table->primary(['id_salles', 'id_options']);
        });

        Schema::create('planningsOptions', function (Blueprint $table) {
            $table->bigInteger('id_plannings')->unsigned();
            $table->bigInteger('id_options')->unsigned();
            $table->foreign('id_plannings')->references('id')->on('plannings');
            $table->foreign('id_options')->references('id')->on('options');
            $table->primary(['id_plannings', 'id_options']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('optionsSalles');
        Schema::dropIfExists('planningsOptions');
    }
}
