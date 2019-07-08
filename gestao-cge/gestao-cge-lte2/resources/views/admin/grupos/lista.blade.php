{{-- resources/views/admin/dashboard.blade.php --}}

@extends('layouts/gestao')

@section('title', 'Cadastrar Grupo')

@section('content_header')
    <h1>Cadastro de Grupo</h1>
@endsection

@section('cabecalho_conteudo')
	<a href="{{ route('grupos.mantem') }}" class="btn btn-primary">Cadastrar Novo Grupo</a>
@endsection
@section('conteudo')
        	<table class="table table-bordered table-hover">
        		<thead>
        			<tr>
        				<th>Descrição</th>
        			</tr>
        		</thead>
        		<tbody>
        			@forelse($grupos as $grupo)
        				<tr>
        					<td>{{ $grupo->descricao}}</td>
        				</tr>
        			@empty
        			@endforelse
        		</tbody>
        	</table>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
    <script> console.log('Hi!'); </script>
@endsection