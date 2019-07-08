<?php

namespace App\Http\Controllers\Usuario;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\MudaSenhaValidaRequest;
use App\Models\GrupoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;

class MantemUsuarioController extends Controller
{
    /**
     *
     * @var User
     */
    private $usuario;
    
    private function validaDados(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'senha' => 'required|min:8',
        ]);
    }
    
    private $totalPorPagina = 10;
    /**
     * 
     * @var GrupoUsuario
     */
    private $grupo;
    public function __construct(User $user, GrupoUsuario $grupo) {
        $this->usuario = $user;
        $this->grupo = $grupo;
    }
    public function listarJson() {
        $usuarios=$this->usuario->paginate(5);
        return response()->json($usuarios);
    }
    public function listar() {
        $usuarios = $this->usuario->paginate($this->totalPorPagina);
        
        return view('admin.usuarios.lista', compact('usuarios'));
    }
    public function exibirForm(Request $request) {
        $botao = "Cadastrar";
        $acao = $request->only("acao");
        if(!empty($acao))
            $acao = $acao["acao"];
        $usuario = "";
        if($acao=="edit" || $acao =="visualizar") {
            $id = $request->only("id")["id"];
            $usuario = User::find($id);
            $botao = "Alterar";
        }
        //dd($usuario);
        $grupos = $this->grupo->all();
        return view('admin.usuarios.form',compact('grupos','usuario','acao','botao'));
    }
    public function cadastrar(Request $request) {
        $dados = $request->except("_token","grupo");
        $this->validaDados($request);
        $acao = "";
        try {
            $grupo = GrupoUsuario::find($request->only("grupo"))[0];
            $password = Hash::make($request->only("senha")["senha"]);
            $dados['password'] = $password;
            $grupo->usuarios()->create($dados);
            return redirect()->route('usuarios.list')->with('msgOk',"Usuário Cadastrado com Sucesso");
        } catch (Exception $e) {
            return view('admin.usuarios.form',['msgErro'=>"Erro ao Cadastrar Usuário",'acao'=>$acao]);
        }
    }
    public function alterar(Request $request) {
        $id = $request->only("id")["id"];
        $this->validaDados($request);
        try {
            $usuario = User::find($id);
            $dados = $request->except("_token","grupo");
            $usuario->fill($dados);
            $usuario->save();
            return redirect()->route('usuarios.list')->with('msgOk',"Usuário Cadastrado com Sucesso");
        
        } catch (Exception $e) {
            return view('admin.usuarios.form',['msgOk'=>"Erro ao Cadastrar Usuário"]);
        }
    }
    public function deletar(Request $request) {
        try {
            $grupo = User::find($request->only("id"))[0];
            $grupo->delete();
            return redirect()->route('usuarios.list')->with('msgOk',"Usuário Removido com Sucesso");
        } catch (Exception $e) {
            return redirect()->route('usuarios.list')->with('msgErro',"Usuário Removido com Sucesso");
        }
    }
    public function alterarSenha(MudaSenhaValidaRequest $request) {
        try {
            $id = $request->only("id")["id"];
            $usuario = User::find($id);
            $usuario->password = Hash::make($request->only("senha")["senha"]);
            $usuario->save();
            return ["msgOk"=>"Senha alterada com Sucesso"];
        } catch (Exception $e) {
            return ["msgErro"=>"Erro ao alterar senha"];
        }
    }
    
}
