{{-- resources/views/admin/dashboard.blade.php --}}

@extends('layouts/gestao')

@section('title', 'Cadastrar Grupo')

@section('content_header')
    <h1>Cadastro de Grupo</h1>
@endsection

@section('cabecalho_conteudo')
@endsection
@section('conteudo')
	<div class="box">
		<div class="box-header">
			
		</div>
		<div class="box-body">
        	<form method="POST" action="{{ route('grupos.cadastra') }}">
        		@if (!empty($acao)) 
            		<input type="hidden" name="id" id="idDisciplina" value="{{ $disciplina->id }}"/>
            		<input type="hidden" name="acao" id="acao" value="{{ $acao}}"/>
            	@endif
            	{!! csrf_field() !!}
            	<div class="form-group">
            		<label for="descricao">Descrição:</label>
            		<input name="descricao" class="form-control @error('descricao') is-invalid @enderror" id="descricao" placeholder="Nome do grupo" type="text" @if($acao=='visualizar') disabled @endif value="@if(!empty($grupo)) {{$grupo->descricao}} @endif"/>
            	</div>
            	<div class="form-group">
            		<button type="submit" class="btn btn-success">Cadastrar</button>
            	</div>
        	</form>
        </div>
    	
	</div>
@endsection




