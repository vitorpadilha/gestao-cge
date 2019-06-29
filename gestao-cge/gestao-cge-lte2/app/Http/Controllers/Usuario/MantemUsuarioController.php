<?php

namespace App\Http\Controllers\Usuario;

use App\User;
use App\Http\Controllers\Controller;
use App\Models\GrupoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MantemUsuarioController extends Controller
{
    /**
     *
     * @var User
     */
    private $usuario;
    /**
     * 
     * @var GrupoUsuario
     */
    private $grupo;
    public function __construct(User $user, GrupoUsuario $grupo) {
        $this->usuario = $user;
        $this->grupo = $grupo;
    }
    public function listar() {
        $usuarios = $this->usuario->all();
        
        return view('admin.usuarios.lista', compact('usuarios'));
    }
    public function exibirForm() {
        $grupos = $this->grupo->all();
        return view('admin.usuarios.form',compact('grupos'));
    }
    public function cadastrar(Request $request) {
        $dados = $request->except("_token","grupo");
//         /array_add($dados, 'grupo', $value);
        $grupo = GrupoUsuario::find($request->only("grupo"))[0];
        $password = Hash::make($request->only("senha")["senha"]);
        $dados['password'] = $password;
        $ok = $grupo->usuarios()->create($dados);
       
        if($ok) {
            return redirect()->route('usuarios.list')->with('msgOk',"Usuário Cadastrado com Sucesso");
        }
        else {
            return view('admin.usuarios.form',['confirmacao'=>"Erro ao Cadastrar Usuário"]);
        }
    }
    public function deletar(Request $request) {
        //         /array_add($dados, 'grupo', $value);
        $grupo = User::find($request->only("id"))[0];
       
        $ok = $grupo->delete();
        
        if($ok) {
            return redirect()->route('usuarios.list')->with('msgOk',"Usuário Removido com Sucesso");
        }
        else {
            return redirect()->route('usuarios.list')->with('msgErro',"Usuário Removido com Sucesso");
        }
    }
}
