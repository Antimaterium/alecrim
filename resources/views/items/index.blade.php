@extends('layouts.admin')

@section('content')
<section class="index">

	
	<h1>Listagem de Itens</h1>
	<div class="card">		
		<div class="card-header">
			Itens
		</div>
		<div class="card-block">
			<table class="table table-bordered table-sm table-hover">
<<<<<<< HEAD
				<tbody>
					<thead>
						<th>Nome</th>
						<th>Descrição</th>
						<th>Categoria</th>
						<th>Preço</th>
						<th>Ações</th>
					</thead>
					@foreach ($registros as $registro)
						<tr>
							<td> {{ $registro->item_name }}</td>
							<td> {{ $registro->item_description }}</td>
							<td> {{ $registro->item_category }}</td>
							<td> {{ $registro->item_price }}</td>
							<td>
								<div class="btn-group">
									<a href="{{ route('items.editar',$registro->id) }}" class="btn btn-sm btn-outline-warning">Editar</a>	
									<a href="javascript:(confirm('Apagar esse resgistro?') ? window.location.href='{{route('items.deletar',$registro->id)}}' : window.location.href='{{route('items.index')}}')" class="btn btn-sm btn-outline-danger" value="delete">Apagar</a>
									<a href="{{ route('items.details',$registro->id) }}" class="btn btn-sm btn-outline-warning">Detalhes</a>	
								</div>
							</td>
						</tr>
					@endforeach
=======
			<thead>
				<th>Nome</th>
				<th>Descrição</th>
				<th>Categoria</th>
				<th>Preço</th>
				<th>Ações</th>
			</thead>
			<tbody>
				@foreach ($registros as $registro)
				<tr>
					<td> {{ $registro->item_name }}</td>
					<td> {{ $registro->item_description }}</td>
					<td> {{ $registro->item_category }}</td>
					<td> {{ $registro->item_price }}</td>
					<td>
					<div class="btn-group">
					<a href="{{ route('items.editar',$registro->id) }}" class="btn btn-sm btn-outline-warning">Editar</a>	
					<a href="javascript:(confirm('Apagar esse resgistro?') ? window.location.href='{{route('items.deletar',$registro->id)}}' : window.location.href='{{route('items.index')}}')" class="btn btn-sm btn-outline-danger" value="delete">Apagar</a>
					<a href="{{ route('items.details',$registro->id) }}" class="btn btn-sm btn-outline-warning">Detalhes</a>	
					</div>
					</td>
				</tr>
				@endforeach
>>>>>>> de4391b3e7b096e178ca01f215fcb175ed4ad0f3

			</tbody>
			</table>

			<div align="center">
				
			</div>
			<nav aria-label="Page navigation example">
			</nav>
		</div>
	</div>
</section>
@stop