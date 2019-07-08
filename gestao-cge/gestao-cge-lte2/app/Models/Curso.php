<?php

namespace App\Models;


class Curso extends ModeloGenerico
{
    protected $fillable = ['descricao','modalidade','periodos'];
    /**
     * Get the comments for the blog post.
     */
    public function matrizesCurriculares()
    {
        return $this->hasMany(MatrizCurricular::class,'idCurso');
    }
}
