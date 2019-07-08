<?php

namespace App\Http\Controllers\Professor;

use App\User;
use App\Http\Controllers\Controller;
use App\Models\Disciplina;
use App\Models\Professor;
use App\Models\RestricoesAula;
use Illuminate\Http\Request;
use Exception;
use App\Models\AreaAtuacao;

class MantemProfessorController extends Controller
{
    /**
     *
     * @var Professor
     */
    private $totalPorPagina = 25;
    private $professor;
    public function __construct(Professor $professor) {
        $this->professor = $professor;
    }
    public function listar() {
        $professores = $this->professor->paginate($this->totalPorPagina);
        
        return view('admin.professores.lista', compact('professores'));
    }
    private function validaDados(Request $request) {
        $request->validate([
            'usuario' => 'required',
            'areasDeAtuacao' => 'required',
        ]);
    }
    public function exibirForm(Request $request) {
        $botao = "Cadastrar";
        $acao = $request->only("acao");
        if(!empty($acao)) 
            $acao = $acao["acao"];
        $professor = "";
        if($acao=="edit" || $acao =="visualizar") {
            $id = $request->only("id")["id"];
            $professor = Professor::find($id);
            $botao = "Alterar";
        }
        $disciplinas = Disciplina::all();
        $areasAtuacao= AreaAtuacao::all();
        $usuarios= User::all();
        $restricoes= RestricoesAula::all();
        return view('admin.professores.form',compact('disciplinas','restricoes','usuarios','areasAtuacao','professor','acao','botao'));
    }
    public function cadastrar(Request $request) {
        $dados = $request->except("_token");
        $this->validaDados($request);
        $acao = '';
        $botao = "Cadastrar";
        try {
            //$usuario = User::find($dados["usuario"]);
            $this->professor->idUsuario = $dados["usuario"];
            $this->professor->save();
            if(isset($dados["disciplinasAlemDaAreaDeAtuacao"]))
                $this->professor->disciplinasAlemDaAreaDeAtuacao()->attach($dados["disciplinasAlemDaAreaDeAtuacao"]);
            $this->professor->areasDeAtuacao()->attach($dados["areasDeAtuacao"]);
            if(isset($dados["restricoes"]))
                $this->professor->restricoes()->attach($dados["restricoes"]); 
            return redirect()->route('professores.list')->with('msgOk',"Usuário Cadastrado com Sucesso");

        } catch (Exception $e) {
            dd($e);
            $disciplinas = Disciplina::all();
            $areasAtuacao= AreaAtuacao::all();
            $usuarios= User::all();
            $restricoes= RestricoesAula::all();
            $arrayCompact = compact('disciplinas','restricoes','usuarios','areasAtuacao','acao','botao');
            array_add($arrayCompact, 'msgErro', "Erro ao Cadastrar Usuário");
            array_add($arrayCompact, 'professor', $this->professor);
            return view('admin.professores.form',$arrayCompact);
        }
       
    }
    public function alterar(Request $request) {
        $dados = $request->except("_token");
        $this->validaDados($request);
        $acao = $request->get("acao");
        $id = $request->only("id")["id"];
        try {
            $this->professor = Professor::find($id);
            $dados = $request->except("_token","grupo");
            $this->professor->disciplinasAlemDaAreaDeAtuacao()->detach();
            $this->professor->areasDeAtuacao()->detach();
            $this->professor->restricoes()->detach();
            if(isset($dados["disciplinasAlemDaAreaDeAtuacao"]))
                $this->professor->disciplinasAlemDaAreaDeAtuacao()->attach($dados["disciplinasAlemDaAreaDeAtuacao"]);
            $this->professor->areasDeAtuacao()->attach($dados["areasDeAtuacao"]);
            if(isset($dados["restricoes"]))
                $this->professor->restricoes()->attach($dados["restricoes"]); 
            $this->professor->save();            
            return redirect()->route('professores.list')->with('msgOk',"Professor Alterado com Sucesso");
        } catch (Exception $e) {
            $botao="Alterar";
            $disciplinas = Disciplina::all();
            $areasAtuacao= Disciplina::all();
            $usuarios= User::all();
            $restricoes= RestricoesAula::all();
            $arrayCompact = compact('disciplinas','restricoes','usuarios','areasAtuacao','acao','botao');
            array_add($arrayCompact, 'msgErro', "Erro ao Alterar Professor");
            array_add($arrayCompact, 'professor', $this->professor);
            return view('admin.professores.form',$arrayCompact);
        }
    }
    public function deletar(Request $request) {
        try {
            $this->professor = Professor::find($request->only("id"))[0];
            $this->professor->delete();
            return redirect()->route('professores.list')->with('msgOk',"Professor Removido com Sucesso");
        } catch (Exception $e) {
        
            return redirect()->route('professores.list')->with('msgErro',"Professor Removido com Sucesso");
        }
    }
}
