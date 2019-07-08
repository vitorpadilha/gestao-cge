{{-- resources/views/admin/dashboard.blade.php --}}

@extends('layouts/gestao')

@section('title', 'Cadastrar Área de Atuação')

@section('content_header')
    <h1>Cadastro de Área de Atuação</h1>
@endsection
@section('cabecalho_conteudo')
@endsection

@section('conteudo')
       	<form method="POST" action="@if (empty($acao)) {{ route('areasatuacao.cadastra') }} @else {{ route('areasatuacao.altera') }} @endif" class="form">
            	@if (!empty($acao)) 
            		<input type="hidden" name="id" id="idAreaAtuacao" value="{{ $areaAtuacao->id }}"/>
            		<input type="hidden" name="acao" id="acao" value="{{ $acao}}"/>
            	@endif
            	{!! csrf_field() !!}
            	<div class="form-group">
            		<label for="descricao">Descrição:</label>
            		<input name="descricao" class="form-control @error('descricao') is-invalid @enderror" id="descricao" placeholder="Nome da área de atuacao" type="text" @if($acao=='visualizar') disabled @endif value="@if(!empty($areaAtuacao)) {{$areaAtuacao->descricao}} @endif"/>
            	</div>
            	<div class="form-group">
            		<label for="disciplinas">Disciplinas:</label><br/>
            	
            		<select id="disciplinas" class="form-control" name="disciplinas[]" multiple @if($acao=='visualizar') disabled @endif>
            			<option value="" disabled selected>Selecione a(s) Disciplina(s)</option>
            			@forelse($disciplinas as $disciplina)
            					<option value="{{ $disciplina->id}}" 
            					@if(!empty($areaAtuacao))
                					@forelse($areaAtuacao->disciplinas as $disciplinaArea)
                						@if($disciplinaArea->id==$disciplina->id) selected @endif                						
                					@empty
                					@endforelse
            					@endif
            					>
            					{{ $disciplina->descricao}}
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
@section('scriptjs')
    <script>
$(document).ready(function(){
	 $('#disciplinas').multiselect({
	  nonSelectedText: 'Select Framework',
	  enableFiltering: true,
	  enableCaseInsensitiveFiltering: true,
	  buttonWidth:'400px'
	 })});
	 </script>
@endsection