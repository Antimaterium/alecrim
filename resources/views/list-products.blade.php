@extends('layout')

@section('content')
<section class="list-products">
	<div class="card">
		@if(old('nome'))
			<div class="alert alert-success">
				Produto {{ old('nome') }} foi adicionado com sucesso!
			</div>	
		@endif
		
		<div class="card-header">
			Produtos
		</div>
		<div class="card-block">
			<table class="table">
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
						</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
	
</section>
@stop