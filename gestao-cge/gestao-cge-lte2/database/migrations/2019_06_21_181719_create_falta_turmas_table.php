<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaltaTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('falta_turmas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idFalta')->unsigned();
            $table->foreign('idFalta')->references('id')->on('faltas');
            
            $table->integer('idTurma')->unsigned();
            $table->foreign('idTurma')->references('id')->on('turmas');
            
            $table->integer('idHorario')->unsigned();
            $table->foreign('idHorario')->references('id')->on('horarios');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('falta_turmas');
    }
}
