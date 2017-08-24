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
		        	<form class="col-lg-6" method="post">
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

			        	  	<div class="row">	
			        	  		<div class="col-lg-12">		
			        	  			<div class="form-group">
			        	  				<div class="row">
			        	  					<div class="col-lg-2">
			        	  						<label for="quantity">Qtd</label>
			        	  						<input type="text" class="form-control form-control-sm" name="quantity" id="quantity" value="1">
			        	  					</div>   
			        	  					<div class="col-lg-6">		
			        	  						<label for="item">Item</label>
					        	    			<input type="text" name="items" id="items" class="form-control form-control-sm"/>
			        	  					</div>     	  					
			        	  				</div>
			        	  			</div>
			        	  		</div>	      			
			        	  	</div>
			        	  	<div class="form-group">		 
								<textarea class="form-control" name="item_description" id="item_description" cols="10" rows="3" readonly></textarea>
			        	  	</div>
			        	  	<div class="btn-group">
			        	  		<button id="add_item" class="btn btn-sm btn-success">Adicionar ao Pedido</button>
			        	  	</div>
			      		</fieldset>
	        	  	</form>

		      		<fieldset class="col-lg-6">
		      			<legend>Items do pedido</legend>
			        	<table class="table table-bordered table-sm table-hover">
						  	<thead>
						    	<tr>
								    <th>Item</th>
								    <th>Valor</th>
						    	</tr>
							</thead>
							<tbody id="table-items-body">
							    				
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

			// GET ITEM
			var selectdItemsList = [];
			var itemSelected  = {};
			var itemNameFieldValue = $('#item_name').val();

			var options = {
				url: "/orders/search-items",
				getValue: "item_name",
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

				  		var quantity = $('#quantity').val();
				  		var item = $('#items').getItemData(0);
				  		var description = item.item_description;

				  		var totalItems = quantity * item.item_price;

				  		$('#item_description').empty();
				  		$('#item_description').append(description);

				  		itemSelected = {
				  			item: item,
				  			quantity: quantity,
				  			totalItems: totalItems
				  		};
				  		
				  	}
			  	},
				template: {
					type: "description",
					fields: {
						description: "item_price"
					}
				}
			};
			$("#items").easyAutocomplete(options);
			// FIM GET ITEM

			$('#add_item').on('click', function(event){
				event.preventDefault();
				console.log(itemSelected.quantity)
				if (itemSelected.quantity === 0 || itemSelected.quantity === undefined) {
					alert("Digite uma quantidade");
				}else if(itemNameFieldValue === undefined){
					alert(itemNameFieldValue);
				}else{
					console.log(itemNameFieldValue);
			  		//adicionando novo produto a lista e ao array
					$('#table-items-body').append('<tr>'
					      	+ '<td>' + itemSelected.quantity + "x " + itemSelected.item.item_name + '</td>'
					      	+ '<td>'
					      		+ " R$" + itemSelected.totalItems						
					      		+ '<button class="btn btn-sm btn-danger btn-icons">'
					      			+ '<i class="material-icons">remove</i>'
					      		+ '</button>'
			      			+ '</td>'
					    + '</tr>');
					selectdItemsList.push(itemSelected.item.id);					
				}
			});

		});
		
	</script>
@endsection