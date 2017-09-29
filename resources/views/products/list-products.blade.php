@extends('layouts.admin')

@section('content')
<section class="list-products">

	@if(old('product_name'))
		<div class="alert alert-success">
			Produto {{ old('product_name') }} foi adicionado com sucesso!
		</div>	
	@endif
	<h1>Listagem de Produtos</h1>
	<div class="card">		
		<div class="card-header">
			Produtos
		</div>
		<div class="card-block">
			@if(sizeOf($products_list) === 0)
				<h2 class="text-center">Nenhum produto</h2>
			@else
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
							<tr class="{{ $product->product_quantity <= $product->product_acceptable_minimum_quantity ? 'bg-danger' : ''}}">
								<td> {{ $product->product_name }}</td>
								<td> {{ $product->product_description }}</td>
								<td> {{ $product->product_quantity }}</td>
								<td> {{ $product->product_price }}</td>
								<td>
									<div class="btn-group">
										<a href="{{ route('product.edit',$product->id) }}" class="btn btn-sm btn-outline-warning">Editar</a>	
										<a href="javascript:(confirm('Apagar esse resgistro?') ? window.location.href='{{route('product.destroy',$product->id)}}' : window.location.href='{{route('product.list')}}')" class="btn btn-sm btn-outline-danger" value="delete">Apagar</a>
										<a href="{{ route('product.show',$product->id) }}" class="btn btn-sm btn-outline-warning">Detalhes</a>
										
									</div>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@endif

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