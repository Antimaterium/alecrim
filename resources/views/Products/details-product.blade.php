@extends('layouts.admin')

@section('content')
<section class="details-product">
	<div class="card">
		<div class="card-header">
			Detalhes
		</div>
		<div class="card-block">
			<h4 class="card-title">{{$product->product_name}}</h1>
			<ul class="list-group">
				<li class="list-group-item">Descrição: {{$product->product_description}}</li>
				<li class="list-group-item">Preço: {{$product->product_price}}</li>
				<li class="list-group-item">Quantidade: {{$product->product_quantity}}</li>
			</ul>
		</div>
	
</section>
@stop