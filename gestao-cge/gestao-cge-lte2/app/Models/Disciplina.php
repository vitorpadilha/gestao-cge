<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $fillable = ['descricao'];
    public function areasDeAtuacao() {
        return $this->belongsToMany(AreaAtuacao::class, 'disciplina_area_atuacao', 'idDisciplina', 'idAreaAtuacao');
    }
    public function horariosAula() {
        return $this->belongsToMany(ItemHorarioTurma::class, 'hora_turma_disciplina', 'idDisciplina', 'idHorarioTurma');
    }
}
