{{-- resources/views/admin/dashboard.blade.php --}}

@extends('layouts/gestao')

@section('title', 'Lista de Área de Atuação')

@section('content_header')
    <h1>Lista de Áreas de Atuação</h1>
@endsection

@section('cabecalho_conteudo')
    <a href="{{ route('areasatuacao.mantem') }}" class="btn btn-primary">Cadastrar Nova Área de Atuação</a>
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
        			@forelse($areas as $area)
        			<tr>
        					<td>{{ $area->descricao}}</td>
        					<td  class="actions">
            					<a href="{{ route('areasatuacao.mantem',['id'=>$area->id,'acao'=>'edit']) }}" class="actions edit">
            						<span class="glyphicon glyphicon-pencil"></span>
            					</a>
        					</td>
        					<td class="actions">
            					<a href="{{ route('areasatuacao.mantem',['id'=>$area->id,'acao'=>'visualizar']) }}" class="actions delete">
            						<span class="glyphicon glyphicon-eye-open"></span>
            					</a>
        					</td>
        					<td class="actions">
            					<a  data-toggle="modal" data-target="#exampleModal{{$area->id}}" class="actions delete">
            						<span class="glyphicon glyphicon-erase"></span>
            					</a>
            					<div class="modal fade" id="exampleModal{{$area->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                  <form action="{{route('areasatuacao.deleta')}}" method="post">
                                  	{!! csrf_field() !!}
                                  	<input type="hidden" name="id" value="{{$area->id}}"/>
                                    <input type="hidden" name="acao" value="remover"/>
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Excluir Área de Atuacao</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        Deseja Realmente apagar a área de atuação "{{$area->descricao}}"?
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary">Confirmar Exclusão de Área de Atuação</button>
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
        	{!! $areas->links() !!}       	
@endsection

@section('scriptjs')
    <script>

    </script>
@endsection