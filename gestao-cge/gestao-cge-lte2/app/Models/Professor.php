<?php

namespace App\Models;

use App\User;

class Professor extends ModeloGenerico
{
    public $table = "professores";
    protected $fillable = ['usuario'];
    public function areasDeAtuacao() {
        return $this->belongsToMany(AreaAtuacao::class, 'professor_area_atuacao', 'idProfessor', 'idAreaAtuacao');
    }
    public function disciplinasAlemDaAreaDeAtuacao() {
        return $this->belongsToMany(Disciplina::class, 'professor_disciplina', 'idProfessor', 'idDisciplina');
    }
    public function restricoes() {
        return $this->belongsToMany(Disciplina::class, 'professor_restricao', 'idProfessor', 'idRestricao');
    }
    public function usuario() {
        return $this->hasOne(User::class,'id','idUsuario');
    }
}
