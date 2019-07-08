<?php

namespace App\Http\Controllers\Disciplina;

use App\Http\Controllers\Controller;
use App\Models\Disciplina;
use Illuminate\Http\Request;
use Exception;

class MantemDisciplinaController extends Controller
{
    /**
     *
     * @var Disciplina
     */
    private $totalPorPagina = 25;
    private $disciplina;
    public function __construct(Disciplina $disciplina) {
        $this->disciplina = $disciplina;
    }
    public function listar() {
        $disciplinas = $this->disciplina->paginate($this->totalPorPagina);
        
        return view('admin.disciplinas.lista', compact('disciplinas'));
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
        $disciplina = "";
        if($acao=="edit" || $acao =="visualizar") {
            $id = $request->only("id")["id"];
            $disciplina = Disciplina::find($id);
            $botao = "Alterar";
        }
        return view('admin.disciplinas.form',compact('disciplina','acao','botao'));
    }
    public function cadastrar(Request $request) {
        $dados = $request->except("_token");
        $this->validaDados($request);
        $acao = '';
        try {
            $this->disciplina = Disciplina::create($dados);            
            return redirect()->route('disciplinas.list')->with('msgOk',"Disciplina Cadastrada com Sucesso");
            
        } catch (Exception $e) {
            return view('admin.disciplinas.form',['msgErro'=>"Erro ao Cadastrar Disciplina",'acao'=>$acao]);
        }
        
    }
    public function alterar(Request $request) {
        $this->validaDados($request);
        $id = $request->only("id")["id"];
        try {
            $this->disciplina = Disciplina::find($id);
            $dados = $request->except("_token");
            $this->disciplina->fill($dados);
            $this->disciplina->save();
            return redirect()->route('disciplinas.list')->with('msgOk',"Disciplina Cadastrada com Sucesso");
        } catch (Exception $e) {
            return view('admin.disciplinas.form',['msgOk'=>"Erro ao Cadastrar Disciplina"]);
        }
    }
    public function deletar(Request $request) {
        try {
            $this->disciplina = Disciplina::find($request->only("id"))[0];
            $this->disciplina->delete();
            return redirect()->route('disciplinas.list')->with('msgOk',"Disciplina Removida com Sucesso");
        } catch (Exception $e) {
            
            return redirect()->route('disciplinas.list')->with('msgErro',"Disciplina Removido com Sucesso");
        }
    }
}
