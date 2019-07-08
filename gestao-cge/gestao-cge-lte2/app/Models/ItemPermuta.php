<?php

namespace App\Models;


class ItemPermuta extends ModeloGenerico
{
    
    private $dataProfessor1AulaAExecutar;
    private $dataProfessor2AulaAExecutar;
    
    public function permuta() {
        return $this->belongsTo(Permuta::class,'idPermuta');
    }
    
    public function aulaProfessor1() {
        return $this->belongsTo(ItemHorarioTurma::class,'idItemHorarioTurma1');
    }
    
    public function aulaProfessor2() {
        return $this->belongsTo(ItemHorarioTurma::class,'idItemHorarioTurma1');
    }    
}