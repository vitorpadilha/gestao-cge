<?php

namespace App\Models;


class ItemHorarioDisponivel extends ModeloGenerico
{
    private $data;
    
    public function horarioDisponivel() {
        return $this->belongsTo(HorarioDisponivel::class,'idHorarioDisponivel');
    }
    public function itemHorarioTurma() {
        return $this->belongsTo(ItemHorarioTurma::class,'idItemHorarioTurma');
    } 
    public function itemFaltaHorario() {
        return $this->belongsTo(ItemFaltaHorario::class,'idItemFaltaHorario');
    }
}