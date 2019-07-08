{{-- resources/views/admin/dashboard.blade.php --}}

@extends('layouts/gestao')

@section('title', 'Cadastrar Disciplina')

@section('content_header')
    <h1>Cadastro de Disciplina</h1>
@endsection
@section('cabecalho_conteudo')
@endsection

@section('conteudo')
       	<form method="POST" action="@if (empty($acao)) {{ route('disciplinas.cadastra') }} @else {{ route('disciplinas.altera') }} @endif" class="form">
            	@if (!empty($acao)) 
            		<input type="hidden" name="id" id="idDisciplina" value="{{ $disciplina->id }}"/>
            		<input type="hidden" name="acao" id="acao" value="{{ $acao}}"/>
            	@endif
            	{!! csrf_field() !!}
            	<div class="form-group">
            		<label for="descricao">Descrição:</label>
            		<input name="descricao" class="form-control @error('descricao') is-invalid @enderror" id="descricao" placeholder="Nome da área de atuacao" type="text" @if($acao=='visualizar') disabled @endif value="@if(!empty($disciplina)) {{$disciplina->descricao}} @endif"/>
            	</div>

            	@if(empty($acao) or $acao=="edit")
            	<div class="form-group">
            		<button type="submit" class="btn btn-success">{{ $botao }}</button>
            	</div>
            	@endif
        	</form>
@endsection