<!-- Modal -->
<div class="modal fade" id="order_modal" tabindex="-1" role="dialog" aria-labelledby="order_modal_title" aria-hidden="true">
  	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">

	      	<div class="modal-header">

	        	<h5 class="modal-title" id="order_modal_title">Criar Pedido</h5>

		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		        	<span aria-hidden="true">&times;</span>
		        </button>

	      	</div>

	      	<div class="modal-body">
	      		<div class="row">

		        	<form class="col-lg-6" method="post">

		        	  	<div class="form-group">
		        	  		<div class="row">

		        	  			<div class="col-lg-3">				        	  				
				        	    	<label for="table">Mesa</label>
				        	    	<input type="text" class="form-control form-control-sm" id="table" value="0">
		        	  			</div>

		        	  			<div class="col-lg-5">
		        	  				<label for="exampleInputEmail1">Atendente</label>
		        	  				<select name="atendent" id="atendent" class="form-control form-control-sm">
		        	  					<option value="">Selecione</option>
		        	  					@foreach($users as $user)
											<option value="{{$user->id}}">{{$user->name}}</option>
		        	  					@endforeach
		        	  				</select>
		        	  			</div>
<!--
		        	  			<div class="col-lg-4">				        	  				
				        	    	<label for="order">Pedido</label>
				        	    	<input type="text" class="form-control form-control-sm" id="order" readonly>
		        	  			</div>
-->
		        	  		</div>
		        	  	</div>

			      		<hr>

			      		<fieldset>		  

			        	  	<div class="row">	
			        	  		<div class="col-lg-12">		
			        	  			<div class="form-group">
			        	  				<div class="row">

			        	  					<div class="col-lg-2">
			        	  						<label for="quantity">Qtd</label>
			        	  						<input type="text" class="form-control form-control-sm" name="quantity" id="quantity" value="1">
			        	  					</div>   

			        	  					<div class="col-lg-10">		
			        	  						<label for="items">Item</label>
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

						<div class="row">
							<div class="col-lg-9">Item</div>
							<div class="col-lg-3">Valor</div>

							<div id="items_order" class="col-lg-12">
										
							</div>
						</div>


						<div class="col-lg-12 order-values">
						<!--
							<div class="row">
								<div class="col-lg-9">Total Pago</div>
								<div class="col-lg-3"> R$<span>----</span></div>
							</div>

							<div class="row">
								<div class="col-lg-9">Susbtotal</div>
								<div class="col-lg-3"> R$<span>----</span></div>
							</div>

						-->
							<div class="row">
								
									<div class="input-group">							
								      	<span class="input-group-addon">Pago</span>								      	
								      	<input type="text" name="paid" id="paid" class="form-control form-control-sm" placeholder="R$00,00">					
								    </div>
								
							</div>
							<div class="row">
								<div class="col-lg-9">Total</div>
								<div class="col-lg-3" >R$<span id="total"> 0 </span></div>
								<input type="hidden" name="total" id="order_total" class="form-control">
							</div>
						</div>
		      		</fieldset>

	      		</div>
		    </div>

		    <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		        <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar Pedido</button> -->
		        <button id="save_order" type="button" class="btn btn-primary">Salvar Pedido</button>
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
			var total = $('#total').text();
			var totalFloat = parseFloat(total);

			var options = {
				url: "/pedidos/busca-itens",
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

				  		var index = $("#items").getSelectedItemIndex();
				  		var quantity = $('#quantity').val();

				  		var item = $('#items').getItemData(index);
				  		var description = item.item_description;

				  		var totalItems = quantity * item.item_price;

				  		$('#item_description').html(description);				  		

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

				totalFloat += itemSelected.totalItems;
				$('#total').html(totalFloat);		
				$('#order_total').val(totalFloat);		

		  		//adicionando novo produto a lista e ao array
				$('#items_order').append(
					'<div class="row item">'
				      	+ '<div class="col-lg-12">' 
				      		+ itemSelected.item.item_name 
				      	+ '</div>'

				      	+ '<div class="col-lg-12">' 
				      		+ '<div class="row">' 

					      		+ '<div class="col-lg-9 ">' 
					      			+ itemSelected.quantity + "x " + itemSelected.item.item_price
					      		+ '</div>'

					      		+ '<div class="col-lg-3">' 
					      			+ " R$" + itemSelected.totalItems
					      		+ '</div>'

				      		+ '</div>'
				      	+ '</div>'
				    + '</div>'
				);

				selectdItemsList.push(itemSelected.item.id);	
				//limpando os campos de items
				$("#items").val('');
				$('#item_description').empty();
				itemSelected = {};
				
			});

			$('#save_order').on('click', function(event) {
				// previnindo a ação default do botão
				event.preventDefault();

				//pegando os valores dos campos
				let atendent = $('#atendent').val();
				let table    = $('#table').val();
				
				// dados que serão enviados
				let data = {
					table: table,
					atendent: atendent,
					order_total: totalFloat,
					items: selectdItemsList,
					paid: 0,
					_token: "{{ csrf_token() }}"
				};
				
				//requisição assincrona para gravar os dados
				$.ajax({
		            type: "POST",
		            url: '/pedidos/salvar',
		            data: data,
		            dataType: 'json',
		            success: function( data ) {
		            	//limpando todos os campos
						$('#items_order').empty();		     
						$('#table').val(0);
						$('input[name*="_token"]').val('');
						$('#total').html(0);        
						$('input[name*="_token"]').val(data.csrf_token);   						
						selectdItemsList = [];
						
						// alert da mensagem de sucesso
		                alert('Pedido inserido com sucesso');		                
		            },
		            error: function(errors) {
		            	alert("erro")
		            	console.log(errors)
		            }
		        });
								
			});

		});	
	</script>
@endsection