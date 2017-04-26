@extends('layout')

@section('content')
<section class="list-products">
	<h1>Listagem de produtos</h1>
	
	<table class="table">
		@foreach ($products_list as $key => $value)
			<tr class="{{ $value->product_quantity <= 1 ? 'danger' : ''}}">
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
</section>
@stop