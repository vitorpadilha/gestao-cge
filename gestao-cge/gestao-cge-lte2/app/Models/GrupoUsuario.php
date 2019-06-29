<?php

namespace App\Models;


use App\User;

class GrupoUsuario extends ModeloGenerico
{
    protected $table = 'grupos';
    
    protected $fillable = ['descricao','usuarios'];
    private $descricao;
    
    public function getDescricao() {
        return $this->descricao;
    }
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    
    public function cadastrar() {
        $this->save();
    }
    
    public function usuarios() {
        return $this->hasMany(User::class,'idGrupo');
    }
}
