{{-- resources/views/admin/dashboard.blade.php --}}

@extends('layouts/gestao')

@section('title', 'Cadastrar Grupo')

@section('content_header')
    <h1>Cadastro de Usuário</h1>
@endsection

@section('cabecalho_conteudo')
@endsection
@section('conteudo')
        	<form method="POST" action="@if (empty($acao)) {{ route('usuarios.cadastra') }} @else {{ route('usuarios.altera') }} @endif" class="form">
            	@if (!empty($acao)) 
            		<input type="hidden" name="id" id="idUsuario" value="{{$usuario->id }}"/>
            		<input type="hidden" name="acao" id="acao" value="{{$acao}}"/>
            	@endif
            	{!! csrf_field() !!}
            	<div class="form-group">
            		<label for="name">Nome:</label>
            		<input name="name" class="form-control" id="name" placeholder="Nome do Usuário" type="text" @if($acao=='visualizar') disabled @endif value="@if(!empty($usuario)) {{$usuario->name}} @endif"/>
            	</div>
            	<div class="form-group">
            		<label for="email">Email:</label>
            		<input name="email" class="form-control" id="email" placeholder="Email do Usuário" type="email" @if($acao=='visualizar') disabled @endif value="@if(!empty($usuario)) {{$usuario->email}} @endif"/>
            	</div>
            	@if (!isset($acao) || empty($acao))
            	<div class="form-group">
            		<label for="senha">Senha Inicial:</label>
            		<input name="senha" class="form-control" id="senha" placeholder="Senha do Usuário" type="password"/>
            	</div>
            	@endif
            	<div class="form-group">
            		<label for="grupo">Grupo:</label>
            		<select name="grupo" class="form-control" id="email" @if($acao=='visualizar') disabled @endif>
            			<option>Selecione o Grupo</option>
            		@forelse($grupos as $grupo)
        				<option value="{{ $grupo->id}}" @if(!empty($usuario) and $usuario->grupo->id==$grupo->id) selected @endif>
        					{{ $grupo->descricao}}
        				</option>
        			@empty
        			@endforelse
            		</select>
            	</div>
            	@if(empty($acao) or $acao=="edit")
            	<div class="form-group">
            		<button type="submit" class="btn btn-success">{{ $botao }}</button>
            	</div>
            	@endif
        	</form>
@endsection