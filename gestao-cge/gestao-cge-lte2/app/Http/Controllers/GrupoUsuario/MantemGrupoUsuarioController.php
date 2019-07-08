<?php
namespace App\Http\Controllers\GrupoUsuario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GrupoUsuario;

class MantemGrupoUsuarioController extends Controller
{
    private $grupo;
    public function __construct(GrupoUsuario $grupo) {
        $this->grupo = $grupo;
        $this->middleware("auth");
    }
    public function listar() {
        $grupos = $this->grupo->all();
        return view('admin.grupos.lista', compact('grupos'));
    }
    public function exibirForm() {
        $acao = '';
        return view('admin.grupos.form',compact('acao'));
    }
    public function cadastrar(Request $request) {
        $dataForm = $request->except("_token");
        $grupo = new GrupoUsuario();
        $acao = "";
        if($this->grupo->create($dataForm)) {
            return redirect()->route('grupos.list')->with('msgOk',"Grupo de Usuário Cadastrado com Sucesso");
        }
        else {
            return view('admin.grupos.form',['msgErro'=>$msg,'acao'=>""]);
        }
    }
}

