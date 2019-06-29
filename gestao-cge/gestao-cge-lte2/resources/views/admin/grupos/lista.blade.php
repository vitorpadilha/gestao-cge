{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Cadastrar Grupo')

@section('content_header')
    <h1>Cadastro de Grupo</h1>
@endsection

@section('content')
	<div class="box">
		<div class="box-header">
			<a href="{{ route('grupos.mantem') }}" class="btn btn-primary">Cadastrar Novo Grupo</a>
		</div>
		<div class="box-body">
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
        </div>
    	
	</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
    <script> console.log('Hi!'); </script>
@endsection