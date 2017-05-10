@extends('layout')

@section('content')
<section class="list-products">

	@if(old('nome'))
		<div class="alert alert-success">
			Produto {{ old('nome') }} foi adicionado com sucesso!
		</div>	
	@endif
	<h1>Listagem de Produtos</h1>
	<div class="card">		
		<div class="card-header">
			Produtos
		</div>
		<div class="card-block">
			<table class="table table-bordered">
				<thead>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Quantidade</th>
					<th>Preço</th>
					<th>Ações</th>
				</thead>
				<tfoot>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Quantidade</th>
					<th>Preço</th>
					<th>Ações</th>
				</tfoot>
				<tbody>
					@foreach ($products_list as $key => $value)
						<tr class="{{ $value->product_quantity <= 1 ? 'bg-danger' : ''}}">
							<td> {{ $value->product_name }}</td>
							<td> {{ $value->product_description }}</td>
							<td> {{ $value->product_quantity }}</td>
							<td> {{ $value->product_price }}</td>
							<td>
								<a href="/lista-produtos/detalhes/{{ $value->id }}">
									<i class="material-icons">search</i>
								</a>
								<a href="/lista-produtos/remove/{{ $value->id }}">
									<i class="material-icons">delete</i>
								</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	
</section>
@stop