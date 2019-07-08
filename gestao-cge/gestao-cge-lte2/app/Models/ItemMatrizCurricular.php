<?php

namespace App\Models;


class ItemMatrizCurricular extends ModeloGenerico
{
    protected $fillable = ['periodo','creditos'];

    
    public function disciplina() {
        return $this->belongsTo(Disciplina::class,"idDisciplina");
    }
    public function matrizCurricular() {
        
        return $this->belongsTo(MatrizCurricular::class,"idMatrizCurricular");
    }
}
