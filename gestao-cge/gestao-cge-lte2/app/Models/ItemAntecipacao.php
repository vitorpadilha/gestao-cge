<?php

namespace App\Models;


class ItemAntecipacao extends ModeloGenerico
{
    private $dataAntecipada;
    
    private $dataRealizacaoAntecipacao;
    /**
     *
     * @var string
     * P="Proposto", A="Aprovado", R="Reprovado"
     */
    private $status;
    public function antecipacao() {
        return $this->belongsTo(Antecipacao::class,"idAntecipacao");
    }
    
    /**
     * Preenche com dos dados já cadastrados para o Docente.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function itemHorarioTurmaAntecipado() {
        return $this->belongsTo(ItemHorarioTurma::class,"idItemHorarioTurma");
    }
    
    /**
     * Preenche com dos dados já cadastrados para o Docente.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function horarioAntecipacao() {
        return $this->belongsTo(Horario::class,"idHorarioAntecipacao");
    }
}
