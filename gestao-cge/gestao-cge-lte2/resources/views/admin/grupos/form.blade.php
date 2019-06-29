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
        	<form method="POST" action="{{ route('grupos.cadastra') }}">
            	{!! csrf_field() !!}
            	<div class="form-group">
            		<label for="descricao">Descrição:</label>
            		<input name="descricao" class="form-control" id="descricao" placeholder="Descrição do Grupo" type="text"/>
            	</div>
            	<div class="form-group">
            		<button type="submit" class="btn btn-success">Cadastrar</button>
            	</div>
        	</form>
        </div>
    	
	</div>
@endsection




