<?php

namespace App\Http\Controllers\MatrizCurricular;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Curso\MantemCursoController;
use App\Models\Curso;
use App\Models\Disciplina;
use App\Models\ItemMatrizCurricular;
use App\Models\MatrizCurricular;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class MantemMatrizCurricularController extends Controller
{

    private $totalPorPagina = 25;
    /**
     *
     * @var MatrizCurricular
     */
    private $matrizCurricular;
    /**
     *
     * @var Curso
     */
    private $curso;
    public function __construct(MatrizCurricular $matrizCurricular, Curso $curso) {
        $this->matrizCurricular = $matrizCurricular;
        $this->curso = $curso;
    }
    public function listar(Request $request) {
        $dados = $request->except("_token");
        $matrizes = MatrizCurricular::where('idCurso', '=', $dados['idCurso'])->paginate(15);
        $curso = Curso::find($dados['idCurso']);
        $modalidades = MantemCursoController::$modalidades;
        $disciplinas = Disciplina::all();
      
        return view('admin.matrizescurriculares.lista', compact('disciplinas','matrizes','curso','modalidades'));
    } 
    private function validaDisciplinas(Request $request, $fail) {
        $dados = $request->except("_token");
        $dadosDisciplinas = array();
        if(!empty($dados["disciplinas"])) $dadosDisciplinas = $dados["disciplinas"];
        if(!empty($dados["creditos"])) $dadosCreditos = $dados["creditos"]; 
        foreach ($dadosDisciplinas as $i => $idsDisciplina) {
            foreach ($idsDisciplina as $j => $idDisciplina) {
                if($dadosDisciplinas[$i][$j]=="" || $dadosCreditos[$i][$j]=="") {
                    $fail(' disciplina é invalida.');
                }
            }
        }        
    }
    private function verificaSeDisciplinaOuCreditoNaoSelecionado($valor, $tipoCampo,$fail) {
        //dd($valor);
        foreach ($valor as $i=>$valorPorModulo) {
            foreach ($valorPorModulo as $j => $valorIndividual) {
                if(empty(trim($valorIndividual)) || $valorIndividual==0) {
                    if($tipoCampo=="D")
                        $fail('A '. ($j+1) . 'ª disciplina do '.$i.'º módulo/período/ano não foi selecionada.');
                    else if($tipoCampo=="C")
                        $fail('O '. ($j+1) . 'º campo "créditos" do '.$i.'º módulo/período/ano não foi selecionado.');
                }
            }
        }
    }
    private function validaDados(Request $request) {
        $validator = Validator::make($request->all(), [
            'descricao' => 'required|max:255',
            'disciplinas' => ['required',function ($attribute, $value, $fail) {
                $this->verificaSeDisciplinaOuCreditoNaoSelecionado($value,'D',$fail);       
            }],
            'creditos' => ['required',function ($attribute, $value, $fail) {
                $this->verificaSeDisciplinaOuCreditoNaoSelecionado($value,'C',$fail);
            }],
        ]);
        if ($validator->fails()) {            
            $dados = $this->carregaDadosForm($request);
            $dadosForm = array_merge($dados, $request->except("_token","itensSelecionados",'creditos','disciplinas'));
            //dd($dadosForm);
            return redirect()->route('matrizescurriculares.mantem',$dadosForm)
            ->withErrors($validator);
        }
        return false;
    }
    private function retornaItensForm(Request $request) {
        $dados = $request->except("_token");
        $dadosDisciplinas = array();
        if(!empty($dados["disciplinas"])) $dadosDisciplinas = $dados["disciplinas"];
        if(!empty($dados["creditos"])) $dadosCreditos = $dados["creditos"];  
        $itensSelecionados = array();
        $creditos = array();
        $disciplinas = array();
        foreach ($dadosCreditos as $i => $creditos2) {
            foreach ($creditos2 as $j => $credito) {
                $imc = new ItemMatrizCurricular();
                $imc->disciplina = new Disciplina();
                if(array_key_exists($i, $dadosDisciplinas) && array_key_exists($j, $dadosDisciplinas[$i])) {
                    $imc->disciplina->id = $dadosDisciplinas[$i][$j];
                    $disciplinas[$i][$j] = $dadosDisciplinas[$i][$j];
                } else {
                    $imc->disciplina->id = 0;
                    $disciplinas[$i][$j] = 0;
                }
                $imc->periodo = $i;
                if(!empty($credito)) {
                    $imc->creditos = $credito;
                    $creditos[$i][$j] = $credito;
                }
                else {
                    $imc->creditos = "";
                    $creditos[$i][$j] = "";
                }
                array_push($itensSelecionados, $imc);
                
            }
        }
        return compact('itensSelecionados','creditos','disciplinas');
    }
    public function carregaDadosForm(Request $request){
        $dadosDisciplinas ='';        
        $dados = $request->except("_token");
        if(!empty($dados["disciplinas"])) $dadosDisciplinas = $dados["disciplinas"];
        $this->curso = Curso::find($dados['idCurso']);
        $curso = $this->curso;
        $itensSelecionados=array();
        if(!empty($dados["id"])) {
            $this->matriz = MatrizCurricular::find($dados["id"]);
            $matriz = $this->matriz;
            $itensSelecionados = $this->matriz->itensMatriz();
        }
        $modalidades = MantemCursoController::$modalidades;
        $disciplinasCadastro = Disciplina::all();
        if(!empty($dadosDisciplinas)) {
            $itensSelecionados = $this->retornaItensForm($request);
        }

        
        return array_merge($itensSelecionados,compact('disciplinasCadastro','modalidades','curso','matriz'));
    }
    
    public function exibirForm(Request $request) {
        $dados = $request->except("_token");
        $botao = "Cadastrar";
        $acao = "";
        if(!empty($dados["acao"])) {            
            $botao = "Alterar";           
        }
        $dadosForm = $this->carregaDadosForm($request);
        return view('admin.matrizescurriculares.form',array_merge($dadosForm, compact('acao','botao')));
    }
    public function cadastrar(Request $request) {
        $dados = $request->except("_token","grupo");
        if($this->validaDados($request)) return $this->validaDados($request);
        $acao = '';
        try {
            $this->matrizCurricular = MatrizCurricular::create($dados);
            if(!empty($dados["disciplinas"]))
                $this->matrizCurricular->disciplinas()->attach($dados["disciplinas"]);           
            return redirect()->route('matrizescurriculares.list')->with('msgOk',"Matriz Curricular Cadastrada com Sucesso");

        } catch (Exception $e) {
            return view('admin.matrizescurriculares.form',['msgErro'=>"Erro ao Cadastrar Matriz Curricular",'acao'=>$acao]);
        }
       
    }
    public function alterar(Request $request) {
        if($this->validaDados($request)) return $this->validaDados($request);
        $id = $request->only("id")["id"];
        try {
            $this->matrizCurricular = MatrizCurricular::find($id);
            $dados = $request->except("_token","grupo");
            $this->matrizCurricular->fill($dados);
            $this->matrizCurricular->disciplinas()->detach();
            $this->matrizCurricular->disciplinas()->attach($request->only("disciplinas")["disciplinas"]);
            $this->matrizCurricular->save();            
            return redirect()->route('matrizescurriculares.list')->with('msgOk',"Matriz Curricular Cadastrada com Sucesso");
        } catch (Exception $e) {
            return view('admin.matrizescurriculares.form',['msgOk'=>"Erro ao Cadastrar Matriz Curricular"]);
        }
    }
    public function deletar(Request $request) {
        try {
            $this->matrizCurricular = MatrizCurricular::find($request->only("id"))[0];
            $this->matrizCurricular->delete();
            return redirect()->route('matrizescurriculares.list')->with('msgOk',"Matriz Curricular Removida com Sucesso");
        } catch (Exception $e) {
        
            return redirect()->route('matrizescurriculares.list')->with('msgErro',"Matriz Curricular Removido com Sucesso");
        }
    }
}
