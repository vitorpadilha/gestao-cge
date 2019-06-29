<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    /**
     * Get the comments for the blog post.
     */
    public function horarios()
    {
        return $this->belongsToMany('App\Models\Horario', 'horario_curso', 'idCurso', 'idHorario');
    }
}
