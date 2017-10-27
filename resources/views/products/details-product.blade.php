@extends('layouts.admin')

@section('content')
<section class="details-product">
	<div class="card">
		<div class="card-header">
			<h3>Detalhes do Produto</h3>
		</div>
		<div class="card-block">
			<h4 class="card-title">{{$product->product_name}}</h1>
			<ul class="list-group">
				<li class="list-group-item">Descrição: {{$product->product_description}}</li>
				<li class="list-group-item">Tipo de Embalagem: {{$product->product_packing}}</li>
				<li class="list-group-item">Preço de Compra: R$ {{$product->product_purchase_price}}</li>
				<li class="list-group-item">Preço de Venda: R$ {{$product->product_price}}</li>
				<li class="list-group-item">Custo por Unidade: R$ {{$product->unit_price}}</li>
				<li class="list-group-item">Quantidade: {{$product->product_quantity}}</li>
				<li class="list-group-item">Quantidade Minima Estoque: {{$product->product_acceptable_minimum_quantity}}</li>
				<li class="list-group-item">Fornecedor: {{$provider->provider_name}}</li>
			</ul>
		</div>
			<a href="/lista-produtos" class="btn btn-primary">Voltar</a>
</section>
@stop