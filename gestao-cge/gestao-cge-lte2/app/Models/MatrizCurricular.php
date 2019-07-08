<?php

namespace App\Models;


class MatrizCurricular extends ModeloGenerico
{
    protected $fillable = ['descricao','anoDeInicio','mesDeInicio','anoDeTermino','mesDeTermino'];
    public $table="matrizesCurriculares";
    public function curso() {
        return $this->belongsTo(Curso::class,"idCurso");
    }
    public function itensMatriz() {
        return $this->hasMany(ItemMatrizCurricular::class,'idMatrizCurricular');
    }
}
