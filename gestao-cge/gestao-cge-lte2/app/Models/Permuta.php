<?php

namespace App\Models;


class Permuta extends ModeloGenerico
{
    /**
     * Get the comments for the blog post.
     */
    /**
     *
     * @var string
     * P="Proposto", A="Aprovado", R="Reprovado"
     */
    private $status;
    
    public function itens()
    {
        return $this->hasMany(ItemPermuta::class,'idPermuta');
    }
}