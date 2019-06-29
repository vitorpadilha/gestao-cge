<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReposicoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reposicoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreign('idFaltaTurma')->references('id')->on('falta_turmas');
            $table->date('dataReposicao');
            $table->enum('status', ['Agendado', 'Informada pelo Docente','Confirmada']);
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
        Schema::dropIfExists('reposicoes');
    }
}
