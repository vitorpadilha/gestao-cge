<?php

namespace App\Models;


class AreaAtuacao extends ModeloGenerico
{
    public $table = "areas_atuacao";
    protected $fillable = ['descricao'];
    private $descricao;
    public function professores() {
        return $this->belongsToMany(Professor::class, 'professor_area_atuacao', 'idAreaAtuacao', 'idProfessor');
    }
    public function disciplinas() {
        return $this->belongsToMany(Disciplina::class, 'disciplina_area_atuacao', 'idAreaAtuacao', 'idDisciplina');
    }
}
