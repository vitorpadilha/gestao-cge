<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permuta extends Model
{
    //
    /**
     * Get the comments for the blog post.
     */
    public function horariosProfessor1()
    {
        return $this->belongsToMany('App\Models\Horario', 'horario_prof1_permuta', 'idPermuta', 'idHorario');
    }
    
    /**
     * Get the comments for the blog post.
     */
    public function horariosProfessor2()
    {
        return $this->belongsToMany('App\Models\Horario', 'horario_prof2_permuta', 'idPermuta', 'idHorario');
    }
}