@extends('layouts.admin')

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
					@foreach ($products_list as $product)
						<tr class="{{ $product->product_quantity <= 1 ? 'bg-danger' : ''}}">
							<td> {{ $product->product_name }}</td>
							<td> {{ $product->product_description }}</td>
							<td> {{ $product->product_quantity }}</td>
							<td> {{ $product->product_price }}</td>
							<td>
								<a href="/lista-produtos/detalhes/{{ $product->id }}">
									<i class="material-icons">search</i>
								</a>
								<a href="/lista-produtos/remove/{{ $product->id }}">
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