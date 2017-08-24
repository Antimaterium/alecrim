<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title" id="exampleModalLongTitle">Criar novo pedido</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		        	<span aria-hidden="true">&times;</span>
		        </button>
	      	</div>
	      	<div class="modal-body">
	      		<div class="row">		      			
		        	<form class="col-lg-6">
		        		{{csrf_field()}}
		        	  	<div class="form-group">
		        	  		<div class="row">
		        	  			<div class="col-lg-3">				        	  				
				        	    	<label for="table">Mesa</label>
				        	    	<input type="text" class="form-control form-control-sm" id="table">
		        	  			</div>
		        	  			<div class="col-lg-5">
		        	  				<label for="exampleInputEmail1">Atendente</label>
		        	  				<select name="" id="" class="form-control form-control-sm">
		        	  					<option value="">SELECIONE</option>
		        	  					<option value="x">João</option>
		        	  					<option value="y">Maria</option>
		        	  				</select>
		        	  			</div>
		        	  			<div class="col-lg-4">				        	  				
				        	    	<label for="table">Pedido</label>
				        	    	<input type="text" class="form-control form-control-sm" id="table" readonly>
		        	  			</div>
		        	  		</div>
		        	  	</div>

			      		<hr>
			      		<fieldset>
			      			<legend>Incluir itens</legend>

			        	  	<div class="form-group">
			        	  		<div class="row">
				        	  		<div class="col-lg-2">
				        	  			<label for="quantity">Qtd</label>
				        	  			<input type="text" class="form-control form-control-sm col-lg-12" name="quantity" id="quantity">
				        	  		</div>        
					        	    <div class="col-lg-10">
					        	    	<label for="item">Item</label>
					        	    	<input type="text" class="form-control form-control-sm" name="name" id="item" placeholder="Digite o nome do item">
					        	    </div>
			        	  		</div> 	
			        	  	</div>
			        	  	<div class="form-group">		        	  		
				        	  	<div class="row">							
					        	    	    
				        	  	</div>
			        	  	</div>

			        	  	<div class="form-group">		 
								<textarea class="form-control" cols="10" rows="3" readonly></textarea>
			        	  	</div>
			        	  	<div class="btn-group">
			        	  		<button id="add_item" class="btn btn-sm btn-success">Adicionar ao Pedido</button>
			        	  	</div>
			      		</fieldset>
	        	  	</form>

		      		<fieldset class="col-lg-6">
		      			<legend>Pedido 00111</legend>
			        	<table class="table table-bordered">
						  	<thead>
						    	<tr>
								    <th>Item</th>
								    <th>Valor</th>
						    	</tr>
							</thead>
							<tbody>
							    <tr>
							      	<td>Mark</td>
							      	<td>
							      		<button class="btn btn-sm btn-danger">						
							      			<i class="material-icons">remove</i>
							      		</button>
					      			</td>
							    </tr>							    
							    <tr>
							      	<td>Mark</td>
							      	<td>
							      		<button class="btn btn-sm btn-danger">						
							      			<i class="material-icons">remove</i>
							      		</button>
					      			</td>
							    </tr>							    
						  </tbody>
						</table>
		      		</fieldset>
	      		</div>

		    </div>
		    <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		        <button type="button" class="btn btn-primary">Salvar Pedido</button>
		    </div>
    	</div>
  	</div>
</div>


@section('project-scripts')
	<script>
		$(document).ready(function() {

			// GET \
			var selectedItems = [];
			var options = {
				url: "/orders/search-items",
				getValue: "item_name",
				requestDelay: 500,
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
				  		var item = $('#item').getItemData(0);
				  		//adicionando novo produto a lista e ao array
						$('#list_items').append('<li class="list-group-item">'+ ''product.product_name + ' - '+ product.product_price +'<button class="btn btn-sm btn-danger btn-remove-product" value="'+ product.id +'" onclick="removeProduct()">Remover</button></li>');
						selectdProducts.push(product.id);
						$("#products").val('');
				  	}
			  	},
				template: {
					type: "description",
					fields: {
						description: "item_price"
					}
				}
			};

			$("#item").easyAutocomplete(options);

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
		            }
		        });

			});

		});

		var listClass = document.getElementsByClassName("btn-primary");

		function addEventListenerList(list, event, fn) {
		    for (var i = 0, len = list.length; i < len; i++) {
		        list[i].addEventListener(event, fn);
		    }
		}

		addEventListenerList(listClass, 'click', function(event) {
			event.preventDefault();
			alert('jksdjas');
		}); 

		
	</script>
@endsection