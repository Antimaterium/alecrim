@extends('layout')

@section('content')
<section class="add-product">
	<h1>Cadastrar produtos</h1>
	
	<form action="/adiciona-produtos/concluido" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
			<label for="">Nome</label>
			<input class="form-control" name="product_name" type="text">
		</div>
		<div class="form-group">
			<label for="">Valor</label>
			<input class="form-control" name="product_price" type="text">
		</div>
		<div class="form-group">
			<label for="">Quantidade</label>
			<input class="form-control" name="product_quantity" type="text">
		</div>
		<div class="form-group">
			<label for="">Descrição</label>
			<textarea class="form-control" name="product_description" type="text"></textarea> 
		</div>
		<button class="btn btn-primary" type="submit">Adicionar</button>
	</form>
</section>
@stop