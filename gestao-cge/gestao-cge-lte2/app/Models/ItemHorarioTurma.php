<?php

namespace App\Models;


class ItemHorarioTurma extends ModeloGenerico
{
    private $dataInicio;
    private $dataFim;
    /**
     * 
     * @var string
     * A="Ativo" I = "Inativo", P="Proposto", R="Reprovado"
     */
    private $status;
    
    public function proposta() {
        return $this->belongsTo(PropostaAlteracaoHorario::class,"idPropostaAlteracao");
    }
    public function itemHorarioTurmaAnterior() {
        return $this->belongsTo(ItemHorarioTurma::class,"idItemHorarioTurmaAnterior");
    }
    public function turma() {        
        return $this->belongsTo(Turma::class,"idTurma");
    }
    public function horario() {
        return $this->belongsTo(Turma::class,"idHorario");
    }
    public function disciplina() {
        return $this->belongsTo(Disciplina::class,"idDisciplina");
    }
    public function professor() {
        return $this->belongsTo(Professor::class,"idProfessor");
    }
}
