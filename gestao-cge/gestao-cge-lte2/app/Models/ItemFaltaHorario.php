<?php

namespace App\Models;


class ItemFaltaHorario extends ModeloGenerico
{
    /**
     * 
     * @var string
     * A="Atraso", F="Falta", FA="Falta Avisada"
     */
    private $tipoRegistro;
    
    /**
     *
     * @var string
     * P="Pendente de Reposição", J="Justificado", RI="Reposição Informada Pelo Docente", RA="Reposição Aprovada Pelo Setor"
     */
    private $status;
    /**
     * Arquivo enviado pelo docente para comprovar a reposição
     * @var string
     */
    private $arquivoReposicao;
    
    private $dataReposicaoProfessor;
    
    private $dataReposicaoAprovado;
    
    public function falta() {
        return $this->belongsTo(Falta::class,"idFalta");
    }
    /**
     * Preenche com dos dados já cadastrados para o Docente.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function itemHorarioTurma() {
        return $this->belongsTo(ItemHorarioTurma::class,"idItemHorarioTurma");
    }
    
    /**
     * Preenche com um horário não cadastrado para o Docente.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function horario() {
        return $this->belongsTo(Horario::class,"horario");
    }
    
    public function itemAntecipacao() {
        return $this->belongsTo(ItemAntecipacao::class,'idItemAntecipacao');
    }
}
