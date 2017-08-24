@extends('layouts.admin')

@section('content')
  <!-- Inclusão do jQuery -->
  <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
  <!-- Inclusão do Plugin jQuery Validation-->
  <script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
  <script type="text/javascript">
  	$(document).ready(function{
  		$('#teste').validate({
  			rules:{
  				item_name:{
  					required: true,
  					minlength: 5
  				},
  				item_description:{
  					required: true,
  					minlength: 5
  				},
  				item_produtos:{
  					required: true
  				},
  				item_categoria:{
  					required: true
  				},
  				item_price:{
  					required: true
  				}
  			},
  			messages:{
  				item_name:{
  					required: true,
  					minlength: 5
  				},
  				item_description:{
  					required: true,
  					minlength: 5
  				},
  				item_produtos:{
  					required: true
  				},
  				item_categoria:{
  					required: true
  				},
  				item_price:{
  					required: true
  				}
  			}
  		});
  	});

  </script>

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