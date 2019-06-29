<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntecipacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecipacoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idProfessor')->unsigned()->nullable(false);
            $table->foreign('idProfessor')->references('id')->on('professores');
            
            $table->integer('idTurma')->unsigned()->nullable(false);
            $table->foreign('idTurma')->references('id')->on('turmas');
            
            $table->date('dataAntecipacao')->nullable(false);
            
            $table->enum('status', ['Agendado', 'Realizado','Não Realizado'])->nullable(false);
            
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
        Schema::dropIfExists('antecipacoes');
    }
}
