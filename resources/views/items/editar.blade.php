@extends('layouts.admin')

@section('content')

<div class="container-fluid">	
	
	<section class="add-product">
		<div class="container-fluid">
			<h1>Editar Items</h1>
			<div class="card">
				<div class="card-header">
					Editar
				</div>
				
				<div class="card-block">	
			
					<form id="form_items" action="{{ route('items.atualizar', $item->id) }}" method="post">
						{{ csrf_field() }}
						
						<input type="hidden" name="_method" value="put">
						
						@include('items._form')
						
						<button class="btn btn-success" type="submit">Salvar</button>
						<a href="/items/index" class="btn btn-primary">Cancelar</a>
					</form>
				</div>
			</div>
		</div>	
	</section>
@stop