<?php

namespace App\Models;

use App\User;

class Falta extends ModeloGenerico
{
    private $dataFalta;
    
    private $observacao;
    
    private $totalDeAulasNoDia;
    
    
    public function professor() {        
        return $this->belongsTo(Professor::class,"idProfessor");
    }
    
    public function usuarioRegistrou() {
        return $this->belongsTo(User::class,"idUsuarioRegistrou");
    }
    
    public function itensHorarioFalta() {
        return $this->hasMany(ItemFaltaHorario::class,'idFalta');
    }
}
