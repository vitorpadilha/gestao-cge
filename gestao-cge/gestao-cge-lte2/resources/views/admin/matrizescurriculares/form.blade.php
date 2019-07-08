{{-- resources/views/admin/dashboard.blade.php --}}

@extends('layouts/gestao')

@section('title', 'Cadastrar Matriz Curricular')

@section('content_header')
    <h1>Cadastro de Matriz Curricular do Curso "{{$curso->descricao}} - {{$modalidades[$curso->modalidade]['nome']}}"</h1>
@endsection
@section('cabecalho_conteudo')
@endsection
@section('conteudo')
       	<form method="POST" action="@if (empty($acao)) {{ route('matrizescurriculares.cadastra',['idCurso'=>$curso->id]) }} @else {{ route('matrizescurriculares.altera',['idCurso'=>$curso->id]) }} @endif" class="form">
            	@if (!empty($acao)) 
            		<input type="hidden" name="id" id="idMatriz" value="{{ $matriz->id }}"/>            		
            		<input type="hidden" name="acao" id="acao" value="{{ $acao }}"/>
            	@endif
            	{!! csrf_field() !!}
            	<input type="hidden" name="idCurso" id="idCurso" value="{{ $curso->id }}"/>
            	<div class="form-group">
            		<label for="descricao">Descrição:</label>
            		<input name="descricao" class="form-control @error('descricao') is-invalid @enderror" id="descricao" placeholder="Descrição da Matriz Curricular" type="text" @if($acao=='visualizar') disabled @endif value="@if(!empty($matriz)) {{$matriz->descricao}} @endif"/>
            	</div>
            	@for ($i = 1; $i <= $curso->periodos; $i++)
                    
                    <div class="form-group">
            			<label for="disciplinaPeriodo{{ $i }}">Disciplinas do {{ $i }}º {{$modalidades[$curso->modalidade]['tipoPeriodo']}}:</label>
						<div class="table-responsive">
							<table class="table table-bordered table-striped" id="disciplinas_{{ $i }}">
								<thead>
									<tr>
										<th width="60%" class="text-center">Disciplina</th>
										<th width="20%" class="text-center">Número de Créditos</th>
										<th width="20%" class="text-center">Ação</th>
									</tr>
								</thead>
								<tbody>
									<td colspan="2"></td><td class="text-center"><button type="button" name="add" id="add_{{$i}}" class="btn btn-success">Adiciona Nova Disciplina</button></td></tr>
                
								</tbody>
							</table>
						</div>
            		</div>
                @endfor
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
	 var contador = [0];
	 @for ($i = 1; $i <= $curso->periodos; $i++)
		contador.push(0);
	 	$(document).on('click', '#add_{{$i}}', function(){
	 		  
	 	      dynamic_field({{$i}},contador[{{$i}}]);
	 	     contador[{{$i}}]++;
	 	});
	 	 $(document).on('click', '.remove_{{$i}}', function(){
	 		contador[{{$i}}]--;
	       	$(this).closest("tr").remove();
	      });
	 	@if(!empty($itensSelecionados))
		 	
	 		@forelse ($itensSelecionados as $item)
	 			@if($item->periodo==$i)
	 				dynamic_field({{$i}},contador[{{$i}}]);
	 				$('#creditos_{{$i}}_'+ contador[{{$i}}]).val({{$item->creditos}});
	 				//$('#disciplinas{{$i}}_'+ contador[{{$i}}] +' option[value={{$item->disciplina->id}}]').select();
	 				//$('#disciplinas{{$i}}_'+ contador[{{$i}}]).val({{$item->disciplina->id}});
	 				$('#disciplinas{{$i}}_'+ contador[{{$i}}]).multiselect('select', {{$item->disciplina->id}});
	 	 			contador[{{$i}}]++;
	 			@endif
	 		@empty
	 		@endforelse
	 	@endif
	 @endfor
    
     function dynamic_field(tabela,numero)
     {
      		html = '<tr>';
            html += '<td class="text-center">';
            html += '<select id="disciplinas'+tabela+'_'+numero+'" class="form-control" name="disciplinas['+tabela+'][]" @if($acao=="visualizar") disabled @endif>';
			html += '<option value="0" selected>Selecione a disciplina</option>';
			@forelse($disciplinasCadastro as $disciplina)
				html += '<option value="{{$disciplina->id}}">{{$disciplina->descricao}}</option>';
			@empty
			@endforelse
            html += '</select></td>';
            html += '<td class="text-center"><input type="number" id="creditos_'+tabela+'_'+numero+'" placeholder="Informe o Número de Créditos para a Disciplina" maxlength="1" max="8" min="1" name="creditos['+tabela+'][]" class="form-control" /></td>';
            html += '<td class="text-center"><button type="button" name="remove" id="remove_'+tabela+'_'+numero+'" class="btn btn-danger remove remove_'+tabela+'">Remover Disciplina</button></td></tr>';
            $('#disciplinas_'+tabela+' tbody').append(html);
            $('#disciplinas'+tabela+'_'+numero).multiselect({
          	  nonSelectedText: 'Selecione o Item',
          	  enableFiltering: true,
          	  enableCaseInsensitiveFiltering: true,
          	  buttonWidth:'100%'
          	 });
      }    
});
 </script>
@endsection