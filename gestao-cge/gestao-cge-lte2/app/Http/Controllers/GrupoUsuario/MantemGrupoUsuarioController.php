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
        $dataAtual = date('d/M/Y');
        return view('admin.grupos.form');
    }
    public function cadastrar(Request $request) {
        $dataForm = $request->except("_token");
        $grupo = new GrupoUsuario();
        if($this->grupo->create($dataForm)) {
            return redirect()->route('grupos.list')->with('msg',"Grupo de Usuário Cadastrado com Sucesso");
        }
        else {
            return view('admin.grupos.form',['confirmacao'=>$msg]);
        }
    }
}

