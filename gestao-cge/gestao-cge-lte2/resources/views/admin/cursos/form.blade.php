{{-- resources/views/admin/dashboard.blade.php --}}

@extends('layouts/gestao')

@section('title', 'Cadastrar Curso')

@section('content_header')
    <h1>Cadastro de Curso</h1>
@endsection
@section('cabecalho_conteudo')
@endsection

@section('conteudo')
       	<form method="POST" action="@if (empty($acao)) {{ route('cursos.cadastra') }} @else {{ route('cursos.altera') }} @endif" class="form">
            	@if (!empty($acao)) 
            		<input type="hidden" name="id" id="idCurso" value="{{ $curso->id }}"/>
            		<input type="hidden" name="acao" id="acao" value="{{ $acao}}"/>
            	@endif
            	{!! csrf_field() !!}
            	<div class="form-group">
            		<label for="descricao">Descrição:</label>
            		<input name="descricao" class="form-control @error('descricao') is-invalid @enderror" id="descricao" placeholder="Nome da área de atuacao" type="text" @if($acao=='visualizar') disabled @endif value="@if(!empty($curso)) {{$curso->descricao}} @endif"/>
            	</div>
            	<div class="form-group">
            		<label for="periodos">Numero de Períodos:</label>
            		<input name="periodos" class="form-control @error('periodos') is-invalid @enderror" id="periodos" placeholder="Número de períodos" type="number" @if($acao=='visualizar') disabled @endif value="@if(!empty($curso)) {{$curso->periodos}} @endif"/>
            	</div>
            	<div class="form-group">
            		<label for="modalidade">Modalidade:</label>
            	
            		<select id="modalidade" class="form-control" name="modalidade" @if($acao=='visualizar') disabled @endif>
            			<option value="" disabled selected>Selecione a Modalidade</option>
            			@forelse($modalidades as $idModalidade=> $modalidade)
            					<option value="{{$idModalidade}}" @if(!empty($curso->modalidade) && $curso->modalidade==$idModalidade) selected @endif >
            					{{$modalidade['nome']}}
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