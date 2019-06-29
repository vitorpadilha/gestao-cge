<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermutasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permutas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idProfessor1')->unsigned();
            $table->foreign('idProfessor1')->references('id')->on('professores');
            
            $table->integer('idProfessor2')->unsigned();
            $table->foreign('idProfessor2')->references('id')->on('professores');
            
            $table->integer('idTurma')->unsigned();
            $table->foreign('idTurma')->references('id')->on('turmas');
            
            $table->date('dataPermuta');
            
            $table->enum('status', ['Agendado', 'Aula Ministrada pelo 1º Prof.','Aula Ministrada pelo 2º Prof.','Permuta Concluída com Sucesso']);
            
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
        Schema::dropIfExists('permutas');
    }
}
