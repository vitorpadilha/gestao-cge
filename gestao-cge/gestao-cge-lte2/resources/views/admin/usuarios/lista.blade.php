{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Cadastrar Usuário')

@section('content_header')
    <h1>Cadastro de Usuário</h1>
@endsection

@section('content')
	<div class="box">
		<div class="box-header">
			<a href="{{ route('usuarios.mantem') }}" class="btn btn-primary">Cadastrar Novo Usuário</a>
		</div>
		<div class="box-body">
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
            					<a href="{{ route('usuarios.mantem',['id'=>$usuario->id,'acao'=>'alterarSenha']) }}" class="actions edit">
            						<span class="glyphicon glyphicon-qrcode"></span>
            					</a>
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
        </div>
    	
	</div>
@endsection

@section('css')

@endsection

@section('js')
    <script>

    </script>
@endsection