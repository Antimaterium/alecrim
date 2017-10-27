@extends('layouts.admin')

@section('content')	
	
	<h1 style="text-align:center">Sistema de Controle e Fluxo de Caixa Alecrim</h1>				
	<div id="content_tables">
		@foreach($data['order'] as $key => $value)
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

			        	  			<div class="col-lg-5" id="opened_atendent_div">
			        	  				<label for="opened_atendent">Atendente</label>
			        	  				<select name="opened_atendent" id="opened_atendent" class="form-control form-control-sm" disabled>
			        	  								        	  		
			        	  				</select>
			        	  				<div id="opened_atendent_error_message"></div>
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
				        	  						<input type="text" class="form-control form-control-sm" name="opened_quantity" id="opened_quantity" value="1">
				        	  					</div>   

				        	  					<div class="col-lg-10">		
				        	  						<label for="opened_items">Item</label>
						        	    			<input type="text" name="opened_items" id="opened_items" class="form-control form-control-sm"/>
						        	    			<div id="opened_item_error_message"></div>
				        	  					</div> 

				        	  				</div>
				        	  			</div>
				        	  		</div>	      			
				        	  	</div>

				        	  	<div class="form-group">		 
									<textarea class="form-control" name="opened_item_description" id="opened_item_description" cols="10" rows="3" disabled></textarea>
				        	  	</div>

				        	  	<div class="btn-group">
				        	  		<button id="opened_add_item" class="btn btn-sm btn-success" disabled>Adicionar ao Pedido</button>
				        	  	</div>

				      		</fieldset>

		        	  	</form>

			      		<fieldset class="col-lg-6">

							<div class="row" id="opened_item_div">
								<div class="col-lg-9">Item</div>
								<div class="col-lg-3">Valor</div>

								<div id="opened_items_order" class="col-lg-12">
											
								</div>
							</div>


							<div class="col-lg-12 opened_order-values">
								<div class="row">
									
									<div class="input-group">							
								      	<span class="input-group-addon">Pago</span>								      	
								      	<input type="text" name="opened_paid" id="opened_paid" class="form-control form-control-sm" placeholder="R$00,00">					
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
			        <button type="button" class="btn btn-success send_opened_ajax" data-dismiss="modal" id="close_opened_order" value="pendente">Salvar Pedido</button>
			        <button type="button" class="btn btn-primary send_opened_ajax" data-dismiss="modal" id="save_opened_order" disabled value="pago">Fechar Pedido</button>			     
			    </div>

	    	</div>
	  	</div>
	</div>
	<script>	


	</script>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	@section('project-scripts')
		<script>	
			//------------------------ HOME ---------------------------------- HOME -------------------------------------- HOME -------------------//
			var selectdOpenedItemsList	= [];						// array de items
			var openedItemSelected  	= {};				  		// objeto do item selecionado
			var opendeTotal 			= "";						// valor total do pedido
			var openedTotalFloat		= 0;  						// valor total convertido em float
			var openedOrders 			= <?= $data['order'] ?>; 	// pedidos em aberto

				// opendeTotal 			= $('#opened_total').text();
				// openedTotalFloat		= parseFloat(opendeTotal);
			function openOrder(obj){
				selectdOpenedItemsList = [];				
				// limpando os campos antes de inserir
				// isso é necessário pois é utilizada a mesma modal para cada pedidos. Evitando dados
				$('#opened_table').empty();
				$('#opened_order_total').empty();
				$('#opened_total').text('');
				$('#opened_paid').empty();
				$('#opened_items_order').empty();
				$('#opened_atendent').empty();

				//  populando os campos
				$('#opened_table').val(obj.order_table);
				$('#opened_order_total').val(obj.order_total);
				$('#opened_total').text(obj.order_total);
				$('#opened_paid').val(obj.order_paid);
				openedTotalFloat = obj.order_total;


				$('#opened_atendent').append("<option value='"+obj.user_id+"'>asjhdhkashdjkas<option>");
				
				obj.items.forEach(function(element, index) {
			  		//adicionando novo produto a lista e ao array
					$('#opened_items_order').append(
						'<div class="row item">'
					      	+ '<div class="col-lg-12">' 
					      		+ element.item_name 
					      	+ '</div>'

					      	+ '<div class="col-lg-12">' 
					      		+ '<div class="row">' 

						      		+ '<div class="col-lg-9 ">' 
						      			+ "R$" + element.item_price + " x " + element.pivot.item_quantity
						      		+ '</div>'

						      		+ '<div class="col-lg-3">' 
						      			+ " R$" + obj.order_total
						      		+ '</div>'

					      		+ '</div>'
					      	+ '</div>'
					    + '</div>'
					);

					let openedSelectedItem = {
						item 		: element,
						quantity 	: element.pivot.item_quantity,
						totalItems 	: obj.order_total
					}

					selectdOpenedItemsList.push(openedSelectedItem);
					
				});
			}		
			
			$(document).ready(function() {


				// validando os botões de salvar e fechar pedido
				$('#opened_paid').on('keyup', function() {
					let paidVal 	= $('#opened_paid').val();
					let totalVal 	= $('#opened_order_total').val();

					if(paidVal == totalVal) {
						$('#close_opened_order').prop("disabled", false);
						$('#save_opened_order').prop("disabled", false);					
					}else if(paidVal < totalVal){
						$('#close_opened_order').prop("disabled", true);
						$('#save_opened_order').prop("disabled", false);					
					}

				});

				// opções do easy autocomplete
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

					  		var index = $("#opened_items").getSelectedItemIndex();
					  		var quantity = $('#opened_quantity').val();
					  		var item = $('#opened_items').getItemData(index);
					  		var description = item.item_description;
					  		var totalItems = quantity * item.item_price;

					  		$('#opened_item_description').html(description);		
					  		$('#opened_add_item').prop("disabled", false);

					  		openedItemSelected = {
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
				// efetuando a busva
				$("#opened_items").easyAutocomplete(options);

		
				// evento do botão de inserir a lista do pedido
				$('#opened_add_item').on('click', function(event){

					event.preventDefault();		

					openedTotalFloat += openedItemSelected.totalItems;
					$('#opened_total').html(openedTotalFloat);		
					$('#opened_order_total').val(openedTotalFloat);		

			  		//adicionando novo produto a lista e ao array
					$('#opened_items_order').append(
						'<div class="row item">'
					      	+ '<div class="col-lg-12">' 
					      		+ openedItemSelected.item.item_name 
					      	+ '</div>'

					      	+ '<div class="col-lg-12">' 
					      		+ '<div class="row">' 

						      		+ '<div class="col-lg-9 ">' 
						      			+ "R$" + openedItemSelected.item.item_price + " x " + openedItemSelected.quantity
						      		+ '</div>'

						      		+ '<div class="col-lg-3">' 
						      			+ " R$" + openedItemSelected.totalItems
						      		+ '</div>'

					      		+ '</div>'
					      	+ '</div>'
					    + '</div>'
					);

					selectdOpenedItemsList.push(openedItemSelected);

					//limpando os campos de items
					$("#opened_items").val('');
					$('#opened_item_description').empty();
					$('#opened_quantity').val(1);
					openedItemSelected = {};				
					$("#opened_items").focus();
					$('#opened_add_item').prop("disabled", true);

				});

				// evento de click para inseriri o pedido
				$('.send_opened_ajax').on('click', function(event) {
					// previnindo a ação default do botão
					event.preventDefault();

					//pegando os valores dos campos
					let atendent 		= $('#opened_atendent').val();
					let order_status 	= $(event.target).val();
					let paid			= $('#opened_paid').val();								

					// dados que serão enviados
					let openedData = {
						table: $('#opened_table').val(),
						atendent: atendent,
						order_total: openedTotalFloat,
						items: selectdOpenedItemsList,
						paid: paid,
						order_status: order_status,
						_token: "{{ csrf_token() }}"
					};

					console.log(openedData);

					//requisição assincrona para gravar os dados
				// 	$.ajax({
			 //            type: "POST",
			 //            url: '/pedidos/salvar',
			 //            data: openedData,
			 //            dataType: 'json',
			 //            success: function( order ) {		 

			 //            	//limpando todos os campos
				// 			$('#opened_total').html(0);        
				// 			$('#opened_table').val(0);
				// 			$('#opened_quantity').val(1);
				// 			$('#opened_paid').val(''); 
				// 			$('#opened_items').val('');
				// 			$('input[name*="_token"]').val('');
				// 			$('#opened_items_order').empty();		     
				// 			$('#opened_item_description').empty();		     
				// 			$('#opened_item_error_message').empty();
				// 			$('#opened_atendent_error_message').empty();
				// 			$('#opened_atendent_div').removeClass('has-danger');
				// 			$('#close_order').prop("disabled", true);	
				// 			$('#opened_item_div').removeClass('has-danger');
				// 			$('input[name*="_token"]').val(data.csrf_token);  
				// 			openedTotalFloat 			= 0;  // zerando o total
				// 			selectdOpenedItemsList 	= []; // limpando o arrau de items selecionados
				// 			data 				= {}; // limpando o objeto data
							
				// 			// alert da mensagem de sucesso
			 //                alert('Pedido inserido com sucesso');		                
			 //            },
			 //            error: function(errors) {
			            	
	   //  		        	if (errors.responseJSON.atendent !== undefined) {
			 //            		$('#opened_atendent_div').addClass('has-danger');
			 //            		$('#opened_atendent_error_message').html('<span class="help-block">'
				// 						                            + '<div class="form-control-feedback">'
				// 						                                + 'Obrigatório'
				// 						                            + '</div>'
				// 						                        + '</span>');
			 //            	}else {
			 //            		$('#opened_atendent_div').removeClass('has-danger');
	   //  	            		$('#opened_atendent_error_message').empty();
			 //            	}	

			 //            	if (errors.responseJSON.items !== undefined) {
			 //            		$('#opened_item_div').addClass('has-danger');
			 //            		$('#opened_item_error_message').html('<span class="help-block">'
				// 						                            + '<div class="form-control-feedback">'
				// 						                                + 'Escolha pelo menos um item'
				// 						                            + '</div>'
				// 						                        + '</span>');
			 //            	}else {
			 //            		$('#opened_item_div').removeClass('has-danger');
	   //  	            		$('#opened_item_error_message').empty();
			 //            	}	
			 //            }
			 //        });
									
				});
			//------------------------ FIM HOME -------------------------------- FIM HOME ------------------------------------- FIM HOME -------------------//
			
			//------------------------ ORDER -------------------------------- ORDER ------------------------------------- ORDER -------------------//

			var selectdItemsList	= [];			 	  		// array de items
			var tableOrderList		= [];				  		// array de mesas ocupadas
			var itemSelected  		= {};				  		// objeto do item selecionado
			var tableSelected 		= "";				  		// mesa selecionada
			var total 				= $('#total').text(); 		// valor total do pedido
			var totalFloat			= parseFloat(total);  		// valor total convertido em float
			var openedOrders 		= <?= $data['order'] ?>; 	// pedidos em aberto

			// iterando as orders para preencher o array de mesas ocupadas
			openedOrders.forEach( function(order, index) {
				tableOrderList[index] = order.order_table;
			});

			// evento de inserção de caractéres no campo mesa
			$('#table').on('keyup', function() {
				tableSelected = parseInt($('#table').val());
				
				// se for maior ou igual a zero significa que o ele já existe no array
				if (tableOrderList.indexOf(tableSelected) >= 0 ) {
					$('#error_table').html("Mesa indisponível");
				}
				else {
					$('#error_table').empty();
				}	
					
			});

			// validando os botões de salvar e fechar pedido
			$('#paid').on('keyup', function() {
				let paidVal 	= $('#paid').val();
				let totalVal 	= $('#order_total').val();

				if(paidVal == totalVal) {
					$('#close_order').prop("disabled", false);
					$('#save_order').prop("disabled", false);					
				}else if(paidVal < totalVal){
					$('#close_order').prop("disabled", true);
					$('#save_order').prop("disabled", false);					
				}

			});

			// opções do easy autocomplete
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
				  		$('#add_item').prop("disabled", false);

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
			// efetuando a busva
			$("#items").easyAutocomplete(options);

	
			// evento do botão de inserir a lista do pedido
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

				selectdItemsList.push(itemSelected);

				//limpando os campos de items
				$("#items").val('');
				$('#item_description').empty();
				$('#quantity').val(1);
				itemSelected = {};				
				$("#items").focus();
				$('#add_item').prop("disabled", true);

			});

			// evento de click para inseriri o pedido
			$('.send_ajax').on('click', function(event) {
				// previnindo a ação default do botão
				event.preventDefault();

				//pegando os valores dos campos
				let atendent 		= $('#atendent').val();
				let order_status 	= $(event.target).val();
				let paid			= $('#paid').val();
				
				if (tableOrderList.indexOf(tableSelected) >= 0) {
					$('#error_table').html("Mesa indisponível");
					return;
				}
				else {
					$('#error_table').empty();	
				}

				// dados que serão enviados
				let data = {
					table: tableSelected,
					atendent: atendent,
					order_total: totalFloat,
					items: selectdItemsList,
					paid: paid,
					order_status: order_status,
					_token: "{{ csrf_token() }}"
				};

				//requisição assincrona para gravar os dados
				$.ajax({
		            type: "POST",
		            url: '/pedidos/salvar',
		            data: data,
		            dataType: 'json',
		            success: function( order ) {		 
		            	// verificando se o pedido inserido é um pedido em aberto com uma mesa relacionada
		            	if (order.order.order_table > 0 && order.order.order_status == 'pendente') {
							$('#content_tables')
								.append('<a data-toggle="modal" id="btn_open_opened_order_modal" data-target="#opened_order_modal" class="table_order" onclick="openOrder('+ order.order +')">'
											+'<span>'+ order.order.order_table +'</span>'
											+'<img src="img/icons/cutlery.svg" alt="order" class="order_image">'
										+'</a>');		      
							openedOrders.push(order.order);  	
		            	}

		            	//limpando todos os campos
						$('#total').html(0);        
						$('#table').val(0);
						$('#quantity').val(1);
						$('#paid').val(''); 
						$('#items').val('');
						$('input[name*="_token"]').val('');
						$('#items_order').empty();		     
						$('#item_description').empty();		     
						$('#item_error_message').empty();
						$('#atendent_error_message').empty();
						$('#atendent_div').removeClass('has-danger');
						$('#close_order').prop("disabled", true);	
						$('#item_div').removeClass('has-danger');
						$('input[name*="_token"]').val(data.csrf_token);  
						totalFloat 			= 0;  // zerando o total
						selectdItemsList 	= []; // limpando o arrau de items selecionados
						data 				= {}; // limpando o objeto data
						
						// alert da mensagem de sucesso
		                alert('Pedido inserido com sucesso');		                
		            },
		            error: function(errors) {
		            	
    		        	if (errors.responseJSON.atendent !== undefined) {
		            		$('#atendent_div').addClass('has-danger');
		            		$('#atendent_error_message').html('<span class="help-block">'
									                            + '<div class="form-control-feedback">'
									                                + 'Obrigatório'
									                            + '</div>'
									                        + '</span>');
		            	}else {
		            		$('#atendent_div').removeClass('has-danger');
    	            		$('#atendent_error_message').empty();
		            	}	

		            	if (errors.responseJSON.items !== undefined) {
		            		$('#item_div').addClass('has-danger');
		            		$('#item_error_message').html('<span class="help-block">'
									                            + '<div class="form-control-feedback">'
									                                + 'Escolha pelo menos um item'
									                            + '</div>'
									                        + '</span>');
		            	}else {
		            		$('#item_div').removeClass('has-danger');
    	            		$('#item_error_message').empty();
		            	}	
		            }
		        });
								
			});
			});


		</script>
	@endsection
	@include('orders._order-modal')	
	

@stop