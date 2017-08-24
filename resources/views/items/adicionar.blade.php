@extends('layouts.admin')

@section('content')
  
<section class="add-product">
<div class="container">
	<h1>Cadastro de Items</h1>
	<div class="card">
		<div class="card-header">
			Adicionar
		</div>
		<div class="card-block">

	<div class="form-group">
		<form id="teste" action="{{route('items.salvar')}}" method="post">
			{{csrf_field()}}
			@include('items._form')	
			<button class="btn btn-primary" id="add_item">Adicionar</button>	
		</form>
	
	</div>
</div>
</section>

@endsection