<?php

namespace App\Http\Controllers\Curso;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use Illuminate\Http\Request;
use Exception;

class MantemCursoController extends Controller
{
    
    private $totalPorPagina = 25;
    public static $modalidades = ['I'=>['nome'=>'Integrado','tipoPeriodo'=>'Ano'],'S'=>['nome'=>'Subsequente','tipoPeriodo'=>'Módulo'],'G'=>['nome'=>'Graduação','tipoPeriodo'=>'Período'], 'ET'=>['nome'=>'Especialização Técnica','tipoPeriodo'=>'Módulo']];
    /**
     *
     * @var Curso
     */
    private $curso;
    public function __construct(Curso $curso) {
        $this->curso = $curso;
    }
    public function listar() {
        $cursos = $this->curso->paginate($this->totalPorPagina);
        //dd($cursos);
        $modalidades = MantemCursoController::$modalidades;
        return view('admin.cursos.lista', compact('cursos','modalidades'));
    }
    private function validaDados(Request $request) {
        $request->validate([
            'descricao' => 'required|max:255',
            'modalidade' =>'required',
            'periodos' =>'required|numeric'
        ]);
    }
    public function exibirForm(Request $request) {
        $botao = "Cadastrar";
        $acao = $request->only("acao");
        if(!empty($acao)) 
            $acao = $acao["acao"];
        $curso = "";
        if($acao=="edit" || $acao =="visualizar") {
            $id = $request->only("id")["id"];
            $curso = Curso::find($id);
            $botao = "Alterar";
        }
        $modalidades = MantemCursoController::$modalidades;
        return view('admin.cursos.form',compact('modalidades','curso','acao','botao'));
    }
    public function cadastrar(Request $request) {
        $dados = $request->except("_token","grupo");
        $this->validaDados($request);
        $acao = '';
        try {
            $this->curso = Curso::create($dados);            
            return redirect()->route('cursos.list')->with('msgOk',"Curso Cadastrado com Sucesso");
        } catch (Exception $e) {
            return view('admin.cursos.form',['msgErro'=>"Erro ao Cadastrar Curso",'acao'=>$acao]);
        }       
    }
    public function alterar(Request $request) {
        $this->validaDados($request);
        $id = $request->only("id")["id"];
        try {
            $this->curso = Curso::find($id);
            $dados = $request->except("_token","grupo");
            $this->curso->fill($dados);
            $this->curso->disciplinas()->detach();
            $this->curso->disciplinas()->attach($request->only("disciplinas")["disciplinas"]);
            $this->curso->save();            
            return redirect()->route('cursos.list')->with('msgOk',"Curso Cadastrado com Sucesso");
        } catch (Exception $e) {
            return view('admin.cursos.form',['msgOk'=>"Erro ao Cadastrar Curso"]);
        }
    }
    public function deletar(Request $request) {
        try {
            $this->curso = Curso::find($request->only("id"))[0];
            $this->curso->delete();
            return redirect()->route('cursos.list')->with('msgOk',"Curso Removido com Sucesso");
        } catch (Exception $e) {
        
            return redirect()->route('cursos.list')->with('msgErro',"Curso Removido com Sucesso");
        }
    }
}
