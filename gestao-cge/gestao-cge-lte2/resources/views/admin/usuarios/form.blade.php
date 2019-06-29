{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Cadastrar Grupo')

@section('content_header')
    <h1>Cadastro de Grupo</h1>
@endsection

@section('content')
	<div class="box">
		<div class="box-header">
			
		</div>
		<div class="box-body">
        	<form method="POST" action="{{ route('usuarios.cadastra') }}" class="form">
            	{!! csrf_field() !!}
            	<div class="form-group">
            		<label for="name">Nome:</label>
            		<input name="name" class="form-control" id="name" placeholder="Nome do Usuário" type="text"/>
            	</div>
            	<div class="form-group">
            		<label for="email">Email:</label>
            		<input name="email" class="form-control" id="email" placeholder="Email do Usuário" type="email"/>
            	</div>
            	<div class="form-group">
            		<label for="senha">Senha Inicial:</label>
            		<input name="senha" class="form-control" id="senha" placeholder="Senha do Usuário" type="password"/>
            	</div>
            	<div class="form-group">
            		<label for="grupo">Grupo:</label>
            		<select name="grupo" class="form-control" id="email">
            			<option>Selecione o Grupo</option>
            		@forelse($grupos as $grupo)
        				<option value="{{ $grupo->id}}">
        					{{ $grupo->descricao}}
        				</option>
        			@empty
        			@endforelse
            		</select>
            	</div>
            	<div class="form-group">
            		<button type="submit" class="btn btn-success">Cadastrar</button>
            	</div>
        	</form>
        </div>
    	
	</div>
@endsection