<?php

namespace App\Models;


class Turma extends ModeloGenerico
{
    private $periodo;
    private $descricao;
    public function curso() {
        return $this->belongsTo(Curso::class,"idDisciplina");
    }
}
