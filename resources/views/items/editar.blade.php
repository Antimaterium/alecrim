@extends('layouts.admin')

@section('content')

<div class="container">	
	<h1>Editar Items</h1>
	
	<div class="row">
		
			<form action="{{ route('items.atualizar', $registro->id) }}" method="post">
				{{ csrf_field() }}
				
				<input type="hidden" name="_method" value="put">
				
				@include('items._form')
				
				<button class="btn btn-success" type="submit">Salvar</button>
				<a href="/items" class="btn btn-primary">Cancelar</a>
			</form>
	</div>
</div>	
@stop