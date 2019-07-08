{{-- resources/views/admin/dashboard.blade.php --}}

@extends('layouts/gestao')

@section('title', 'Lista de Usuários')

@section('content_header')
    <h1>Lista de Usuários</h1>
@endsection

@section('cabecalho_conteudo')
    <a href="{{ route('usuarios.mantem',['id'=>0,'acao'=>'']) }}" class="btn btn-primary">Cadastrar Novo Usuário</a>
@endsection
@section('conteudo')





<!-- div id="container2">
	<input type="text" class="form-control" v-model="urlList" value="{{route('usuarios.list.json')}}">
    <table class="table table-bordered">
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Created At</th>
      </tr>
      <tr v-for="user in users.data">
        <td>@{{ user.name }}</td>
        <td>@{{ user.email }}</td>
        <td>@{{ user.created_at }}</td>
      </tr>
    </table>
    <vue-pagination  :pagination="users"
                     @paginate="getUsers()"
                     :offset="4">
    </vue-pagination>
</div -->










        	<table class="table table-bordered table-hover">
        		<thead>
        			<tr>
        				<th class="text-center">Nome</th>
        				<th class="text-center">Email</th>
        				<th class="text-center">Grupo</th>
        				<th colspan="4" class="text-center">Ações</th>
        			</tr>
        		</thead>
        		<tbody>
        			@forelse($usuarios as $usuario)
        			<tr>
        					<td>{{ $usuario->name}}</td>
        					<td>{{ $usuario->email}}</td>
        					<td>{{ $usuario->grupo->descricao}}</td>
        					<td  class="actions">
            					<a href="{{ route('usuarios.mantem',['id'=>$usuario->id,'acao'=>'edit']) }}" class="actions edit">
            						<span class="glyphicon glyphicon-pencil"></span>
            					</a>
        					</td>
        					<td class="actions">
            					<a href="{{ route('usuarios.mantem',['id'=>$usuario->id,'acao'=>'visualizar']) }}" class="actions delete">
            						<span class="glyphicon glyphicon-eye-open"></span>
            					</a>
        					</td>
        					<td class="actions">
            					<a data-toggle="modal" data-target="#modalMudaSenha{{$usuario->id}}" class="actions edit">
            						<span class="glyphicon glyphicon-qrcode"></span>
            					</a>
            					<div class="modal fade" id="modalMudaSenha{{$usuario->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                  <form action="{{route('usuarios.altera.senha')}}" id="formSenha_{{$usuario->id}}" method="post" onsubmit="return false;">
                                  	{!! csrf_field() !!}
                                  	<input type="hidden" name="id" value="{{$usuario->id}}"/>
                                    <input type="hidden" name="acao" value="remover"/>
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Excluir Usuário</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                      	<div class="form-group">
                                      		<label for="senha{{$usuario->id}}">Nova Senha:</label>
                                        	<input name="senha" class="form-control" id="senha{{$usuario->id}}" placeholder="Digite a Nova Senha" type="password"/>
                                        </div>
                                        <div class="form-group">
                                        	<label for="confirmasenha{{$usuario->id}}">Confirmar Nova Senha:</label>
                                        	<input name="confirmasenha" class="form-control" id="confirmasenha{{$usuario->id}}" placeholder="Confirme a Nova Senha" type="password"/>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <button type="button" class="btn btn-primary" onclick="alteraSenha({{$usuario->id}})">Alterar Senha</button>
                                      </div>
                                    </div>
                                    </form>
                                  </div>
                                </div>
        					</td>
        					<td class="actions">
            					<a  data-toggle="modal" data-target="#exampleModal{{$usuario->id}}" class="actions delete">
            						<span class="glyphicon glyphicon-erase"></span>
            					</a>
            					<div class="modal fade" id="exampleModal{{$usuario->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                  <form action="{{route('usuarios.deleta')}}" method="post">
                                  	{!! csrf_field() !!}
                                  	<input type="hidden" name="id" value="{{$usuario->id}}"/>
                                    <input type="hidden" name="acao" value="remover"/>
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Excluir Usuário</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        Deseja Realmente apagar o usuário "{{$usuario->name}}"?
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary">Confirmar Exclusão de Usuário</button>
                                      </div>
                                    </div>
                                    </form>
                                  </div>
                                </div>
        					</td>
        				</tr>
        				
        			@empty
        			@endforelse
        		</tbody>
        	</table>
        	{!! $usuarios->links() !!}
        	     		
        	
@endsection

@section('scriptjs')
    <script>
  
	function alteraSenha(id) {
		var senha = $("#formSenha_"+id+" input[name=senha]").val();
		var confirmasenha = $("#formSenha_"+id+" input[name=confirmasenha]").val();
		var data = $("#formSenha_"+id).serialize();
		if(senha.trim().length<5) {
			data = {'msgErro':'Senha com menos de 5 caracteres'};
			alertModal(data);
		}
		else if(senha==confirmasenha) {			
    		$.ajax({
    			type:"post",
    			url:"{{ route('usuarios.altera.senha') }}",
    			data: data,
    			cache:false,
    			success: function (data) {
    				alertModal(data);    				
    			},
    			error: function (jqXHR, textStatus, errorThrown) {
    				
    				alert(jqXHR.responseText);
    			},
    			});
		}
		else {
			data = {'msgErro':'Senhas Diferentes. A senha do usuário não foi trocada'};
			alertModal(data);
		}
		return false;
	}
	
    </script>
@endsection