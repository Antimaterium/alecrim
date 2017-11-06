@extends('layouts.admin')

@section('content')
<section class="add-product">
	<h1>Cadastrar produtos</h1>
	
	<div class="card">
		<div class="card-header">
			Adicionar
		</div>
		<div class="card-block">
			<form id="add-product" action="/adiciona-produtos" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row">
					<div class="col-lg-10">
						<div class="form-group {{ $errors->has('product_name') ? 'has-danger' : '' }}">
							<label for="product_name">Nome</label>
							<input class="form-control form-control-sm" id="product_name" name="product_name" type="text">
							@if($errors->has('product_name'))
		                        <span class="help-block">
		                            <div class="form-control-feedback">
		                                {{ $errors->first('product_name') }}
		                            </div>
		                        </span>
		                    @endif
	                   </div>
                    </div>
                    <div class="col-lg-2">
						<div class="form-group {{ $errors->has('product_price') ? 'has-danger' : '' }}">
							<label for="product_price">Valor de venda</label>
							<input class="form-control form-control-sm" name="product_price" id="product_price" type="text">
							@if($errors->has('product_price'))
			                    <span class="help-block">
			                        <div class="form-control-feedback">
			                            {{ $errors->first('product_price') }}
			                        </div>
			                    </span>
			                @endif
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group {{ $errors->has('product_description') ? 'has-danger' : '' }}">
							<label for="product_description">Descrição</label>
							<textarea class="form-control form-control-sm" name="product_description" id="product_description" type="text"></textarea> 
							@if($errors->has('product_description'))
		                        <span class="help-block">
		                            <div class="form-control-feedback">
		                                {{ $errors->first('product_description') }}
		                            </div>
		                        </span>
		                    @endif
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-2">
						<div class="form-group {{ $errors->has('product_acceptable_minimum_quantity') ? 'has-danger' : '' }}">
							<label for="product_acceptable_minimum_quantity">Qtd. mínima</label>
							<input class="form-control form-control-sm" name="product_acceptable_minimum_quantity" id="product_acceptable_minimum_quantity" type="number">
							@if($errors->has('product_acceptable_minimum_quantity'))
		                        <span class="help-block">
		                            <div class="form-control-feedback">
		                                {{ $errors->first('product_acceptable_minimum_quantity') }}
		                            </div>
		                        </span>
		                    @endif
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group {{ $errors->has('product_packing') ? 'has-danger' : '' }}">
							<label for="product_packing">Tipo de embalagem</label>
							<select name="product_packing" id="product_packing" class="form-control form-control-sm">
								<option value="" disabled selected>Selecione</option>
								<option value="Caixa">Caixa</option>
								<option value="Pacote">Pacote</option>
								<option value="Peça">Peça</option>
							</select>
							@if($errors->has('product_packing'))
		                        <span class="help-block">
		                            <div class="form-control-feedback">
		                                {{ $errors->first('product_packing') }}
		                            </div>
		                        </span>
		                    @endif
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group {{ $errors->has('product_purchase_price') ? 'has-danger' : '' }}">
							<label for="product_purchase_price">Valor de compra</label>
							<input class="form-control form-control-sm" name="product_purchase_price" id="product_purchase_price" type="text">
							@if($errors->has('product_purchase_price'))
		                        <span class="help-block">
		                            <div class="form-control-feedback">
		                                {{ $errors->first('product_purchase_price') }}
		                            </div>
		                        </span>
		                    @endif
						</div>
					</div>	
					<div class="col-lg-2">
						<div class="form-group {{ $errors->has('product_quantity') ? 'has-danger' : '' }}">
							<label for="product_quantity">Quantidade(unit.)</label>
							<input class="form-control form-control-sm" name="product_quantity" id="product_quantity" type="number">
							@if($errors->has('product_quantity'))
		                        <span class="help-block">
		                            <div class="form-control-feedback">
		                                {{ $errors->first('product_quantity') }}
		                            </div>
		                        </span>
		                    @endif
						</div>
					</div>					
					<div class="col-lg-2">
						<label for="">Custo por un.</label>
						<div id="unit_price_field"></div>
						<input type="hidden" name="product_purchase_unit_price" id="product_purchase_unit_price">
					</div>								
				</div>
				<fieldset>
					<legend><h3>Fornecedor</h3></legend>
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group {{ $errors->has('provider_name') ? 'has-danger' : '' }}">
								<label for="provider_name">Nome</label>
								<input type="text" class="form-control form-control-sm" id="provider_name" name="provider_name">
								@if($errors->has('provider_name'))
			                        <span class="help-block">
			                            <div class="form-control-feedback">
			                                {{ $errors->first('provider_name') }}
			                            </div>
			                        </span>
			                    @endif
							</div>
						</div>
						
					</div>
				</fieldset>
				<button class="btn btn-success" type="submit">Adicionar</button>
				<a href="/lista-produtos" class="btn btn-primary">Cancelar</a>
			<!-- 	<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal" style="float: right;">
				  	Importar Excel
				</button> -->
			</form>
		</div>
	</div>
</section>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title" id="exampleModalLabel">Importar Excel</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
      	<div class="modal-body">
        	<form>
  				<div class="form-group">
  					<label for="file" class="btn">Select Image</label>
  					<input type="file" class="form-control form-control-sm" id="file" name="Escolha um arquivo">
  					<small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
  				</div>
			</form>
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        	<a href="/excel/products/import" class="btn btn-primary">Importar</a>
      	</div>
    	</div>
  	</div>
</div>
@stop

@section('project-scripts')
<script>
$(document).ready(function(){
	$('#product_purchase_price, #product_quantity').on('keyup', function(){
		let purchase_price 	= parseFloat($('#product_purchase_price').val());
		let quantity 		= parseFloat($('#product_quantity').val());
		let unitPrice 		= purchase_price / quantity;
		
		if (quantity != '' && purchase_price != '') {
			$('#unit_price_field').html(unitPrice);
			$('#product_purchase_unit_price').val(unitPrice);
		}

	});

	$('#add-product').validate({
	    rules: {
	        product_name: {
	            required: true,
	            minlength: 3,
	            maxlength: 100
	        },
	        product_price: {
	            required: true,
	            minlength:1
	        },
	        product_description: {
	            required: true,
	            minlength: 10,
	            maxlength: 100
	        },
	        product_acceptable_minimum_quantity: {
	            required: true,
	            minlength: 1,
	        },
	        product_packing: {
	            required: true,
	        },
	        product_quantity: {
	            required: true,
	            minlength: 1,
	        },
	        product_purchase_price: {
	        	required: true,
	        	minlength: 1,
	        },
	        provider_name: {
	        	required: true,
	        	minlength: 2,
	        	maxlength: 100,
	        },
	    },
	    messages: {
	        product_name: {
	            required: "Campo obrigatório",
	            minlength: "No mínimo 3 caractéres",
	            maxlength: "No máximo 100 caractéres",
	        },
	        product_price: {
	            required: "Campo obrigatório",
	            minlength: "Digite um valor maior que zero",
	        },
	        product_description: {
	            required: "Campo obrigatório",
	            minlength: "No mínimo 10 caractéres",
	            maxlength: "No máximo 100 caractéres"
	        },
	        product_acceptable_minimum_quantity: {
	            required: "Campo obrigatório",
	            minlength: "Informe valor maior que zero",
	        },
	        product_packing: {              
	            required: "Selecione uma opção",
	        },
	        product_quantity: {
	        	required: "Campo obrigatório",
	        	minlength: "Informe um valor maior que zero",
	        },
	        product_purchase_price: {
	        	required: "Campo obrigatório",
	        	minlength: "valor deve ser maior que zero",
	        },
	        provider_name: {
	        	required: "informe um Fornecedor",
	        	minlength: "No mínimo 3 caractéres",
	            maxlength: "No máximo 100 caractéres" 
	        },

	    },
	});

});
</script>
@stop
