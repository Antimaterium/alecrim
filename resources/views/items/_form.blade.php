<div class="row">	
	<div class="col-lg-12">		
		<div class="form-group">
			<div class="row">
				<div class="col-lg-8">
					<label>Nome</label>
					<input type="text" name="item_name" id="item_name" class="form-control form-control-sm" value="{{isset($registro->item_name) ? $registro->item_name : ''}}">
				</div>
				<div class="col-lg-4">							
					<label>Categoria</label>
					<input type="text" name="item_categoria" id="item_categoria" class="form-control form-control-sm" value="{{isset($registro->item_categoria) ? $registro->item_categoria : ''}}">
				</div>
			</div>
		</div>
	</div>	      			
</div>

<div class="row">	
	<div class="col-lg-12">		
		<div class="form-group">
			<div class="row">
				<div class="col-lg-6">		
					<label>Produtos</label>
					<input type="text" name="products" id="products" class="form-control form-control-sm" value="{{isset($products->item_produtos) ? $products->item_produtos : ''}}"/>
				</div>
				<div class="col-lg-6">									
					<ul class="list-group" id="list_products">
						
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
				<div class="col-lg-10">		
					<label>Descrição</label>
					<input type="text" name="item_description" id="item_description" class="form-control form-control-sm" value="{{isset($registro->item_description) ? $registro->item_description : ''}}">					
				</div>
				<div class="col-lg-2">
					<label>Valor</label>
					<input type="text" name="item_price" id="item_price" class="form-control form-control-sm" value="{{isset($registro->item_price) ? $registro->item_price : ''}}">
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
				  		//var value = $('#products').getSelectedItemData().id;
				  		var product = $('#products').getItemData(0);
				  		//adicionando novo produto a lista e ao array
						$('#list_products').append('<li class="list-group-item">'+ product.product_name + ' - '+ product.product_price +'<button class="btn btn-sm btn-danger btn-remove-product" value="'+ product.id +'" onclick="removeProduct()">Remover</button></li>');
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
				let itemCategory 	= $("#item_categoria").val();
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
		            	console.log(typeof(errors))

		            }
		        });

			});

		});

	</script>
@endsection