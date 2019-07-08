<?php

namespace App\Models;

use App\User;
class PropostaAlteracaoHorario extends ModeloGenerico
{
    /**
     * 
     * @var string
     * P="Proposto", A="Aprovado", R="Reprovado"
     */
    private $status;
    
    private $dataEnvioProposta;

    private $dataInicioProposta;

    private $dataInicioEfetivo;
    
    public function usuarioPropos() {
        return $this->belongsTo(User::class,"idUsuarioPropos");
    }
    public function usuarioAprovacaoOuReprovacao() {
        return $this->belongsTo(User::class,"idUsuarioAprovacaoReprovacao");
    }
    public function itens() {
        return $this->belongsToMany(ItemHorarioTurma::class, 'item_proposta_alteracao_proposta', 'idProposta', 'idItemHorarioTurma');
    }
}
