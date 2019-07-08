{{-- resources/views/admin/dashboard.blade.php --}}

@extends('layouts/gestao')

@section('title', 'Cadastrar Professores')

@section('content_header')
    <h1>Cadastro de Professores</h1>
@endsection
@section('cabecalho_conteudo')
@endsection

@section('conteudo')
       	<form method="POST" action="@if (empty($acao)) {{ route('professores.cadastra') }} @else {{ route('professores.altera') }} @endif" class="form">
            	@if (!empty($acao)) 
            		<input type="hidden" name="id" id="idProfessor" value="{{ $professor->id }}"/>
            		<input type="hidden" name="acao" id="acao" value="{{ $acao}}"/>
            	@endif
            	{!! csrf_field() !!}
            	<div class="form-group">
            		<label for="usuario">Usuário:</label><br/>
            		<select id="usuario" class="form-control" name="usuario" @if($acao=='visualizar') disabled @endif>
            			<option value="" disabled selected>Selecione o Usuário</option>
            			@forelse($usuarios as $usuario)
            				<option value="{{$usuario->id}}" @if(!empty($professor->usuario) && $professor->usuario->id==$usuario->id) selected @endif >
            					{{$usuario->name}}
            				</option>
            			@empty
            			@endforelse
            		</select>
            	</div>
				<div class="form-group">
            		<label for="areasDeAtuacao">Área(s) de Atuação:</label><br/>
            		<select id="areasDeAtuacao" class="form-control" name="areasDeAtuacao[]" multiple @if($acao=='visualizar') disabled @endif>
            			<option value="" disabled selected>Selecione a(s) Área(s) de Atuação</option>
            			@forelse($areasAtuacao as $areaAtuacao)
            					<option value="{{ $areaAtuacao->id}}" 
            					@if(!empty($professor) && !empty($professor->areasDeAtuacao))
                					@forelse($professor->areasDeAtuacao as $areaAtuacaoProf)
                						@if($areaAtuacaoProf->id==$areaAtuacao->id) selected @endif                						
                					@empty
                					@endforelse
            					@endif
            					>
            					{{ $areaAtuacao->descricao}}
            				</option>
            			@empty
            			@endforelse
            		</select>
            	</div>
            	<div class="form-group">
            		<label for="disciplinasAlemDaAreaDeAtuacao">Disciplinas Que Pode Atuar Além das Já Associadas à(s) Área(s) de Atuação:</label><br/>
            		<select id="disciplinasAlemDaAreaDeAtuacao" class="form-control" name="disciplinasAlemDaAreaDeAtuacao[]" multiple @if($acao=='visualizar') disabled @endif>
            			<option value="" disabled selected>Selecione a(s) Disciplina(s)</option>
            			@forelse($disciplinas as $disciplina)
            					<option value="{{ $disciplina->id}}" 
            					@if(!empty($professor) && !empty($professor->disciplinasAlemDaAreaDeAtuacao))
                					@forelse($professor->disciplinasAlemDaAreaDeAtuacao as $disciplinaProf)
                						@if($disciplinaProf->id==$disciplina->id) selected @endif                						
                					@empty
                					@endforelse
            					@endif
            					>
            					{{$disciplina->descricao}}
            				</option>
            			@empty
            			@endforelse
            		</select>
            	</div>
            	<div class="form-group">
            		<label for="restricoes">Restrições:</label><br/>
            		<select id="restricoes" class="form-control" name="restricoes[]" multiple @if($acao=='visualizar') disabled @endif>
            			<option value="" disabled selected>Selecione a(s) Restrição(ões)</option>
            			@forelse($restricoes as $restricao)
            					<option value="{{ $restricao->id}}" 
            					@if(!empty($professor)  && !empty($professor->restricoes))
                					@forelse($professor->restricoes as $restricaoProf)
                						@if($restricaoProf->id==$restricao->id) selected @endif                						
                					@empty
                					@endforelse
            					@endif
            					>
            					{{ $restricao->descricao}}
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
	 $('#disciplinasAlemDaAreaDeAtuacao').multiselect({
	  nonSelectedText: 'Select Framework',
	  enableFiltering: true,
	  enableCaseInsensitiveFiltering: true,
	  buttonWidth:'400px'
	 });
	 $('#restricoes').multiselect({
	  nonSelectedText: 'Select Framework',
	  enableFiltering: true,
	  enableCaseInsensitiveFiltering: true,
	  buttonWidth:'400px'
	 });
	 $('#areasDeAtuacao').multiselect({
	  nonSelectedText: 'Select Framework',
	  enableFiltering: true,
	  enableCaseInsensitiveFiltering: true,
	  buttonWidth:'400px'
	 });
	 $('#usuario').multiselect({
	  nonSelectedText: 'Select Framework',
	  enableFiltering: true,
	  enableCaseInsensitiveFiltering: true,
	  buttonWidth:'400px'
	 });
		 
	 });
	 </script>
@endsection