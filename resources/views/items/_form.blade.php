<div class="row">	
	<div class="col-lg-12">		
		<div class="form-group">
			<div class="row">
				<div class="col-lg-8" id="name">
					<label>Nome</label>
					<input type="text" name="item_name" id="item_name" class="form-control form-control-sm" value="{{ isset($item->item_name) ? $item->item_name : ''}}">
					<div id="name_error_message"></div>
				</div>
				<div class="col-lg-4" id="category">							
					<label>Categoria</label>
					<select name="item_category" id="item_category" class="form-control form-control-sm" value="{{ isset($item->item_category) ? $item->item_category : ''}}">
						<option value="" selected disabled>Selecione</option>
						<option value="Bebidas alcoólicas">Bebidas alcoólicas</option>
						<option value="Bebidas não alcoólicas">Bebidas não alcoólicas</option>
						<option value="Lanches">Lanches</option>
						<option value="Porções">Porções</option>
						<option value="Pratos">Pratos</option>
					</select>
					<div id="category_error_message"></div>
				</div>
			</div>
		</div>
	</div>	      			
</div>

<div class="row">	
	<div class="col-lg-12">		
		<div class="form-group">
			<div class="row">
				<div class="col-lg-6" id="product">		
					<label>Produtos</label>
					<input type="text" name="products" id="products" class="form-control form-control-sm"/>
					<div id="product_error_message"></div>
				</div>
				<div class="col-lg-6">									
					<ul class="list-group" id="list_products">
						@if(isset($item->products))
							<ul class="list-group">
								@foreach($item->products as $product)
									<li class="list-group-item">
										{{$product->product_name}} - {{ $product->product_price }}
									</li>
								@endforeach
							</ul>
						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>	      			
</div>

<div class="row">	
	<div class="col-lg-12">		
		<div class="form-group">
			<div class="row">
				<div class="col-lg-10" id="description">		
					<label>Descrição</label>
					<input type="text" name="item_description" id="item_description" class="form-control form-control-sm" value="{{ isset($item->item_description) ? $item->item_description : '' }}">					
					<div id="description_error_message"></div>
				</div>
				<div class="col-lg-2" id="price">
					<label>Valor</label>
					<input type="text" name="item_price" id="item_price" class="form-control form-control-sm" value="{{ isset($item->item_price) ? $item->item_price : ''}}">
					<div id="price_error_message"></div>
				</div>
			</div>
		</div>
	</div>	      			
</div>

@section('project-scripts')
	<script>

		$(document).ready(function() {

			// GET PRODUCTS
			var selectdProducts = [];

			var options = {

				url: "/items/search-products",
				getValue: "product_name",
				requestDelay: 400,

			 	list: {
			  		maxNumberOfElements: 10,

				  	sort: { 
		  				enabled: true 
		  			}, 

				  	match: {
				  		enabled: true
				  	},

				  	onChooseEvent: function() {


				  		var index = $("#products").getSelectedItemIndex();
				  		var product = $('#products').getItemData(index);

				  		//adicionando novo produto a lista e ao array
						$('#list_products')
							.append('<li class="list-group-item">'
										+ product.product_name + ' - '+ product.product_price 
										+'<button class="btn btn-sm btn-danger btn-remove-product" value="'
										+ product.id 
										+'" onclick="removeProduct()">Remover</button></li>'
						);

						selectdProducts.push(product.id);

						$("#products").val('');

				  	}
			  	},

				template: {
					type: "description",
					fields: {
						description: "product_price"
					}
				}

			};

			$("#products").easyAutocomplete(options);

			// SEND AJAX
			$("#add_item").on('click', function(event){
				
				event.preventDefault();

				// pegando os valores dos campos
				let itemName 		= $("#item_name").val();
				let itemDescription = $("#item_description").val();
				let itemCategory 	= $("#item_category").val();
				let itemPrice 		= $("#item_price").val();
				let token			= $("input[name*='_token']").val();

				// objeto data que será enviado no ajax
				let data = {
					item_name: itemName,
					item_description: itemDescription,
					item_category: itemCategory,
					item_price: itemPrice,
					products: selectdProducts,
					_token: token
				}

				//requisição assincrona para gravar os dados
				$.ajax({
		            type: "POST",
		            url: '/items/salvar',
		            data: data,
		            dataType: 'json',
		            success: function( msg ) {
		                window.location.href = "/items/index";
		            },
		            error: function(errors) {	
		            	
		            	if (errors.responseJSON.item_category !== undefined) {
		            		$('#category').addClass('has-danger');
		            		$('#category_error_message').html('<span class="help-block">'
								                            + '<div class="form-control-feedback">'
								                                + errors.responseJSON.item_category
								                            + '</div>'
								                        + '</span>');
		            	}else {
		            		$('#category').removeClass('has-danger');
    	            		$('#category_error_message').html('');
		            	}

		            	if (errors.responseJSON.item_name !== undefined) {
		            		$('#name').addClass('has-danger');
		            		$('#name_error_message').html('<span class="help-block">'
								                            + '<div class="form-control-feedback">'
								                                + errors.responseJSON.item_name
								                            + '</div>'
								                        + '</span>');
		            	}else {
		            		$('#name').removeClass('has-danger');
    	            		$('#name_error_message').html('');
		            	}		       

		            	if (errors.responseJSON.item_description !== undefined) {
		            		$('#description').addClass('has-danger');
		            		$('#description_error_message').html('<span class="help-block">'
								                            + '<div class="form-control-feedback">'
								                                + errors.responseJSON.item_description
								                            + '</div>'
								                        + '</span>');
		            	}else {
		            		$('#description').removeClass('has-danger');
    	            		$('#description_error_message').html('');
		            	}

		            	if (errors.responseJSON.item_price !== undefined) {
		            		$('#price').addClass('has-danger');
		            		$('#price_error_message').html('<span class="help-block">'
								                            + '<div class="form-control-feedback">'
								                                + errors.responseJSON.item_price
								                            + '</div>'
								                        + '</span>');
		            	}else {
		            		$('#price').removeClass('has-danger');
    	            		$('#price_error_message').html('');
		            	}		        		  

    		        	if (selectdProducts.length === 0) {
    		            		$('#product').addClass('has-danger');
    		            		$('#product_error_message').html('<span class="help-block">'
    							                            + '<div class="form-control-feedback">'
    							                                + "Escolha pelo menos um produto"
    							                            + '</div>'
    							                        + '</span>');
    	            	}else{
    	            		$('#product').removeClass('has-danger');
    	            		$('#product_error_message').html('');
    	            	}		

		            }


		        });		        

			});

		});		

	</script>
@endsection