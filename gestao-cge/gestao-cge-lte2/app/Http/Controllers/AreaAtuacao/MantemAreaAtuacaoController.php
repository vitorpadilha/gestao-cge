<?php

namespace App\Http\Controllers\AreaAtuacao;

use App\Http\Controllers\Controller;
use App\Models\AreaAtuacao;
use App\Models\Disciplina;
use Illuminate\Http\Request;
use Exception;

class MantemAreaAtuacaoController extends Controller
{
    /**
     *
     * @var AreaAtuacao
     */
    private $totalPorPagina = 25;
    private $areaAtuacao;
    private $disciplina;
    public function __construct(AreaAtuacao $area, Disciplina $disciplina) {
        $this->areaAtuacao = $area;
        $this->disciplina = $disciplina;
    }
    public function listar() {
        $areas = $this->areaAtuacao->paginate($this->totalPorPagina);
        
        return view('admin.areasatuacao.lista', compact('areas'));
    }
    private function validaDados(Request $request) {
        $request->validate([
            'descricao' => 'required|max:255'
        ]);
    }
    public function exibirForm(Request $request) {
        $botao = "Cadastrar";
        $acao = $request->only("acao");
        if(!empty($acao)) 
            $acao = $acao["acao"];
        $areaAtuacao = "";
        if($acao=="edit" || $acao =="visualizar") {
            $id = $request->only("id")["id"];
            $areaAtuacao = AreaAtuacao::find($id);
            $botao = "Alterar";
        }
        $disciplinas = $this->disciplina->all();
        return view('admin.areasatuacao.form',compact('disciplinas','areaAtuacao','acao','botao'));
    }
    public function cadastrar(Request $request) {
        $dados = $request->except("_token","grupo");
        $this->validaDados($request);
        $acao = '';
        try {
            $this->areaAtuacao = AreaAtuacao::create($dados);
            if(!empty($dados["disciplinas"]))
                $this->areaAtuacao->disciplinas()->attach($dados["disciplinas"]);           
            return redirect()->route('areasatuacao.list')->with('msgOk',"Área de Atuação Cadastrada com Sucesso");

        } catch (Exception $e) {
            return view('admin.areasatuacao.form',['msgErro'=>"Erro ao Cadastrar Área de Atuação",'acao'=>$acao]);
        }
       
    }
    public function alterar(Request $request) {
        $this->validaDados($request);
        $id = $request->only("id")["id"];
        try {
            $this->areaAtuacao = AreaAtuacao::find($id);
            $dados = $request->except("_token");
            $this->areaAtuacao->fill($dados);
            $this->areaAtuacao->disciplinas()->detach();
            if(!empty($dados["disciplinas"]))
                $this->areaAtuacao->disciplinas()->attach($dados["disciplinas"]);
            $this->areaAtuacao->save();            
            return redirect()->route('areasatuacao.list')->with('msgOk',"Área de Atuação Cadastrada com Sucesso");
        } catch (Exception $e) {
            return view('admin.areasatuacao.form',['msgOk'=>"Erro ao Cadastrar Área de Atuação"]);
        }
    }
    public function deletar(Request $request) {
        try {
            $this->areaAtuacao = AreaAtuacao::find($request->only("id"))[0];
            $this->areaAtuacao->delete();
            return redirect()->route('areasatuacao.list')->with('msgOk',"Área de Atuação Removida com Sucesso");
        } catch (Exception $e) {
        
            return redirect()->route('areasatuacao.list')->with('msgErro',"Área de Atuação Removido com Sucesso");
        }
    }
}
