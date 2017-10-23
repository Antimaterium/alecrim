@extends('layouts.admin')

@section('content')	
	
	<h1 style="text-align:center">Sistema de Controle e Fluxo de Caixa Alecrim</h1>				
	<div id="content_tables">
		@foreach($openOrders as $key => $value)
		<a data-toggle="modal" id="btn_open_opened_order_modal" data-target="#opened_order_modal" class="table_order" onclick="openOrder({{ $value }})">
			<span>{{$value->order_table}}</span>
			<img src="img/icons/cutlery.svg" alt="order" class="order_image">
		</a>
		@endforeach
	</div>	

	<!-- Button trigger modal  new order-->
	<button 
		type="button" 
		class="btn btn btn-primary" 
		data-toggle="modal" 
		id="btn_open_order_modal" 
		data-target="#order_modal">
		<i class="material-icons">add</i>
	</button>


	<!-- Modal opened order -->
	<div class="modal fade" id="opened_order_modal" tabindex="-1" role="dialog" aria-labelledby="opened_order_modal_title" aria-hidden="true">
	  	<div class="modal-dialog modal-lg" role="document">
	    	<div class="modal-content">

		      	<div class="modal-header">

		        	<h5 class="modal-title" id="opened_order_modal_title">Pedido</h5>

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
					        	    	<label for="opened_table">Mesa</label>
					        	    	<input type="text" class="form-control form-control-sm" id="opened_table" value="0" disabled>
			        	  			</div>

			        	  			<div class="col-lg-5">
			        	  				<label for="opened_atendent">Atendente</label>
			        	  				<select name="opened_atendent" id="opened_atendent" class="form-control form-control-sm" disabled>
			        	  					<option value="" selected disabled></option>
			        	  					
			        	  				</select>
			        	  			</div>
			        	  		</div>
			        	  	</div>

				      		<hr>

				      		<fieldset>		  

				        	  	<div class="row">	
				        	  		<div class="col-lg-12">		
				        	  			<div class="form-group">
				        	  				<div class="row">

				        	  					<div class="col-lg-2">
				        	  						<label for="">Qtd</label>
				        	  						<input type="text" class="form-control form-control-sm" name="opened_quantity" id="opened_quantity" value="1" disabled>
				        	  					</div>   

				        	  					<div class="col-lg-10">		
				        	  						<label for="opened_items">Item</label>
						        	    			<input type="text" name="opened_items" id="opened_items" class="form-control form-control-sm" disabled />
				        	  					</div> 

				        	  				</div>
				        	  			</div>
				        	  		</div>	      			
				        	  	</div>

				        	  	<div class="form-group">		 
									<textarea class="form-control" name="opened_item_description" id="opened_item_description" cols="10" rows="3" disabled></textarea>
				        	  	</div>

				        	  	<div class="btn-group">
				        	  		<button id="opened_add_item" class="btn btn-sm btn-success">Adicionar ao Pedido</button>
				        	  	</div>

				      		</fieldset>

		        	  	</form>

			      		<fieldset class="col-lg-6">

							<div class="row">
								<div class="col-lg-9">Item</div>
								<div class="col-lg-3">Valor</div>

								<div id="opened_items_order" class="col-lg-12">
											
								</div>
							</div>


							<div class="col-lg-12 opened_order-values">
								<div class="row">
									
									<div class="input-group">							
								      	<span class="input-group-addon">Pago</span>								      	
								      	<input type="text" name="opened_paid" id="opened_paid" class="form-control form-control-sm" placeholder="R$00,00" disabled>					
								    </div>
									
								</div>
								<div class="row">
									<div class="col-lg-9">Total</div>
									<div class="col-lg-3" >R$<span id="opened_total"> 0 </span></div>
									<input type="hidden" name="opened_order_total" id="opened_order_total" class="form-control">
								</div>
							</div>
			      		</fieldset>

		      		</div>
			    </div>

			    <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			        <button type="button" class="btn btn-success" data-dismiss="modal" disabled>Salvar Pedido</button>
			        <button type="button" class="btn btn-primary" data-dismiss="modal" disabled>Fechar Pedido</button>			     
			    </div>

	    	</div>
	  	</div>
	</div>

	
	<script>	

		function openOrder(obj){

			$.ajax({
				type: 'GET',
				contentType: 'json',
				url: '/pedidos/pendentes/'+obj.id,
				success: function(data) {
					$('#opened_table').val(obj.order_table);
					$('#opened_order_total').val(obj.order_total);
					$('#opened_total').text(obj.order_total);
					$('#opened_paid').val(obj.order_paid);

					data.forEach(function(element, index) {
				  		//adicionando novo produto a lista e ao array
						$('#opened_items_order').append(
							'<div class="row item">'
						      	+ '<div class="col-lg-12">' 
						      		+ element.item_name 
						      	+ '</div>'

						      	+ '<div class="col-lg-12">' 
						      		+ '<div class="row">' 

							      		+ '<div class="col-lg-9 ">' 
							      			+ '1' + "x " + element.item_price
							      		+ '</div>'

							      		+ '<div class="col-lg-3">' 
							      			+ " R$" + obj.order_total
							      		+ '</div>'

						      		+ '</div>'
						      	+ '</div>'
						    + '</div>'
						);
						
					});

				},
				error: function(err) {
					console.error(err);
				}
			});
		}
	</script>

	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	@include('orders._order-modal')	


@stop