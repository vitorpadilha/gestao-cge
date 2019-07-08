<?php

namespace App\Models;


class HorarioDisponivel extends ModeloGenerico
{
    public function itens()
    {
        return $this->hasMany(ItemHorarioDisponivel::class,'idHorarioDisponicel');
    }
}
