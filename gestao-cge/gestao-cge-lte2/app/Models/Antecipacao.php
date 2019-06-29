<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Antecipacao extends Model
{
    protected $table = 'antecipacoes';
    /**
     * Get the comments for the blog post.
     */
    public function horariosOriginal()
    {
        return $this->belongsToMany('App\Models\Horario', 'horario_original', 'idAntecipacao', 'idHorario');
    }
    
    /**
     * Get the comments for the blog post.
     */
    public function horariosAntecipados()
    {
        return $this->belongsToMany('App\Models\Horario', 'horario_antecipacao', 'idAntecipacao', 'idHorario');
    }
}
