{{-- resources/views/admin/dashboard.blade.php --}}

@extends('layouts/gestao')

@section('title', 'Lista de Disciplinas')

@section('content_header')
    <h1>Lista de Disciplinas</h1>
@endsection

@section('cabecalho_conteudo')
    <a href="{{ route('disciplinas.mantem') }}" class="btn btn-primary">Cadastrar Nova Disciplina</a>
@endsection
@section('conteudo')
        	<table class="table table-bordered table-hover">
        		<thead>
        			<tr>
        				<th class="text-center">Descrição</th>
        				<th colspan="3" class="text-center">Ações</th>
        			</tr>
        		</thead>
        		<tbody>
        			@forelse($disciplinas as $disciplina)
        			<tr>
        					<td>{{ $disciplina->descricao}}</td>
        					<td  class="actions">
            					<a href="{{ route('disciplinas.mantem',['id'=>$disciplina->id,'acao'=>'edit']) }}" class="actions edit">
            						<span class="glyphicon glyphicon-pencil"></span>
            					</a>
        					</td>
        					<td class="actions">
            					<a href="{{ route('disciplinas.mantem',['id'=>$disciplina->id,'acao'=>'visualizar']) }}" class="actions delete">
            						<span class="glyphicon glyphicon-eye-open"></span>
            					</a>
        					</td>
        					<td class="actions">
            					<a  data-toggle="modal" data-target="#exampleModal{{$disciplina->id}}" class="actions delete">
            						<span class="glyphicon glyphicon-erase"></span>
            					</a>
            					<div class="modal fade" id="exampleModal{{$disciplina->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                  <form action="{{route('disciplinas.deleta')}}" method="post">
                                  	{!! csrf_field() !!}
                                  	<input type="hidden" name="id" value="{{$disciplina->id}}"/>
                                    <input type="hidden" name="acao" value="remover"/>
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Excluir Disciplina</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        Deseja Realmente apagar a disciplina "{{$disciplina->descricao}}"?
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary">Confirmar Exclusão de Disciplina</button>
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
        	{!! $disciplinas->links() !!}
        	     		
        	
@endsection

@section('scriptjs')
    <script>

    </script>
@endsection