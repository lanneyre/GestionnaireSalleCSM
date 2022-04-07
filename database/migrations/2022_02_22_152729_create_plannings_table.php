<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plannings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date("date");
            $table->bigInteger('id_groupe')->unsigned();
            $table->bigInteger('id_salle')->unsigned()->nullable();
            $table->foreign('id_groupe')->references('id')->on('groupes');
            $table->foreign('id_salle')->references('id')->on('salles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plannings');
    }
}
