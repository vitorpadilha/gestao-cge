<?php

namespace App\Models;


class Antecipacao extends ModeloGenerico
{
    protected $table = 'antecipacoes';
    /**
     * Get the comments for the blog post.
     */
    
    
    public function professor()
    {
        return $this->belongsTo(Professor::class,"idProfessor");
    }
    
    public function itens()
    {
        return $this->hasMany(ItemAntecipacao::class,'idAntecipacao');
    }
}
