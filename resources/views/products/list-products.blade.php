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
			<table class="table table-bordered table-sm table-hover">
				<thead>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Quantidade</th>
					<th>Preço</th>
					<th>Ações</th>
				</thead>
				<tbody>
					@foreach ($products_list as $product)
						<tr class="{{ $product->product_quantity <= 1 ? 'bg-danger' : ''}}">
							<td> {{ $product->product_name }}</td>
							<td> {{ $product->product_description }}</td>
							<td> {{ $product->product_quantity }}</td>
							<td> {{ $product->product_price }}</td>
							<td>
								<div class="btn-group">
									<a href="{{ route('product.edit',$product->id) }}" class="btn btn-sm btn-outline-warning">Editar</a>	
									<a href="javascript:(confirm('Apagar esse resgistro?') ? window.location.href='{{route('product.destroy',$product->id)}}' : window.location.href='{{route('product.list')}}')" class="btn btn-sm btn-outline-danger" value="delete">Apagar</a>
								</div>
							</td>
						</tr>
					@endforeach

				</tbody>
			</table>
			<div align="center">
				
			</div>
			<nav aria-label="Page navigation example">
			  <ul class="pagination">
			  	@foreach($products_list->links() as $link)
			    	<li class="page-item">
			    		<a class="page-link" href="#">{{ $link }}</a>
		    		</li>
			    @endforeach
			  </ul>
			</nav>
		</div>
	</div>
	
</section>
@stop