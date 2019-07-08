{{-- resources/views/admin/dashboard.blade.php --}}

@extends('layouts/gestao')

@section('title', 'Lista de Curso')

@section('content_header')
    <h1>Lista de Cursos</h1>
@endsection

@section('cabecalho_conteudo')
    <a href="{{ route('cursos.mantem') }}" class="btn btn-primary">Cadastrar Novo Curso</a>
@endsection
@section('conteudo')
        	<table class="table table-bordered table-hover">
        		<thead>
        			<tr>
        				<th class="text-center">Descrição</th>
        				<th class="text-center">Modalidade</th>
        				<th colspan="4" class="text-center">Ações</th>
        			</tr>
        		</thead>
        		<tbody>
        			@forelse($cursos as $curso)
        			<tr>
        					<td>{{$curso->descricao}}</td>
        					<td>{{$modalidades[$curso->modalidade]['nome']}}</td>
        					<td  class="actions">
            					<a href="{{ route('matrizescurriculares.list',['idCurso'=>$curso->id,'acao'=>'list']) }}" class="actions matriz">
            						<span class="glyphicon glyphicon-th"></span>
            					</a>
        					</td>
        					<td  class="actions">
            					<a href="{{ route('cursos.mantem',['id'=>$curso->id,'acao'=>'edit']) }}" class="actions edit">
            						<span class="glyphicon glyphicon-pencil"></span>
            					</a>
        					</td>
        					<td class="actions">
            					<a href="{{ route('cursos.mantem',['id'=>$curso->id,'acao'=>'visualizar']) }}" class="actions delete">
            						<span class="glyphicon glyphicon-eye-open"></span>
            					</a>
        					</td>
        					<td class="actions">
            					<a  data-toggle="modal" data-target="#exampleModal{{$curso->id}}" class="actions delete">
            						<span class="glyphicon glyphicon-erase"></span>
            					</a>
            					<div class="modal fade" id="exampleModal{{$curso->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                  <form action="{{route('cursos.deleta')}}" method="post">
                                  	{!! csrf_field() !!}
                                  	<input type="hidden" name="id" value="{{$curso->id}}"/>
                                    <input type="hidden" name="acao" value="remover"/>
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Excluir Curso</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        Deseja Realmente apagar o Curso "{{$curso->descricao}}"?
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary">Confirmar Exclusão de Curso</button>
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
        	{!! $cursos->links() !!}
        	     		
        	
@endsection

@section('scriptjs')
    <script>

    </script>
@endsection