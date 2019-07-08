{{-- resources/views/admin/dashboard.blade.php --}}

@extends('layouts/gestao')

@section('title', 'Lista de Matrizes Curriculares')

@section('content_header')
    <h1>Matrizes Curriculares - "{{$curso->descricao}} - {{$modalidades[$curso->modalidade]['nome']}}"</h1>
@endsection

@section('cabecalho_conteudo')
    <a href="{{ route('matrizescurriculares.mantem',['idCurso'=>$curso->id]) }}" class="btn btn-primary">Cadastrar Nova Matriz Curricular para o Curso</a>
@endsection
@section('conteudo')
        	<table class="table table-bordered table-hover">
        		<thead>
        			<tr>
        				<th class="text-center">Descrição</th>
        				<th class="text-center">Início</th>
        				<th class="text-center">Término</th>
        				<th colspan="3" class="text-center">Ações</th>
        			</tr>
        		</thead>
        		<tbody>
        			@forelse($matrizes as $matriz)
        			<tr>
        					<td>{{$matriz->descricao}}</td>
        					<td>{{$matriz->$mesDeInicio}} {{$matriz->anoDeInicio}}</td>
        					<td>@if (!empty($matriz->anoDeTermino)) {{$matriz->$mesDeTermino}}  {{$matriz->$anoDeTermino}}   @endif</td>
        					<td  class="actions">
            					<a href="{{ route('matrizescurriculares.mantem',['id'=>$matriz->id,'acao'=>'edit']) }}" class="actions edit">
            						<span class="glyphicon glyphicon-pencil"></span>
            					</a>
        					</td>
        					<td class="actions">
            					<a href="{{ route('matrizescurriculares.mantem',['id'=>$matriz->id,'acao'=>'visualizar']) }}" class="actions delete">
            						<span class="glyphicon glyphicon-eye-open"></span>
            					</a>
        					</td>
        					<td class="actions">
            					<a  data-toggle="modal" data-target="#exampleModal{{$matriz->id}}" class="actions delete">
            						<span class="glyphicon glyphicon-erase"></span>
            					</a>
            					<div class="modal fade" id="exampleModal{{$matriz->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                  <form action="{{route('matrizescurriculares.deleta')}}" method="post">
                                  	{!! csrf_field() !!}
                                  	<input type="hidden" name="id" value="{{$matriz->id}}"/>
                                    <input type="hidden" name="acao" value="remover"/>
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Excluir Matriz Curricular</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        Deseja Realmente apagar a Matriz Curricular "{{$matriz->descricao}}"?
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary">Confirmar Exclusão de Matriz Curricular</button>
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
        	{!! $matrizes->links() !!}
        	     		
        	
@endsection

@section('scriptjs')
    <script>

    </script>
@endsection