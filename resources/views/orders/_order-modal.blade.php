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
		        <div class="alert alert-success" role="alert" id="alert_success">
				  	Pedido inserido com sucesso.
				</div>
	      		<div class="row">


		        	<form class="col-lg-6" method="post" id="form_order_modal">

		        	  	<div class="form-group">
		        	  		<div class="row">

		        	  			<div class="col-lg-3">				        	  				
				        	    	<label for="table">Mesa</label>
				        	    	<input type="text" class="form-control form-control-sm" id="table" value="0">
				        	    	<span id="error_table"></span>
		        	  			</div>

		        	  			<div class="col-lg-5" id="atendent_div">
		        	  				<label for="exampleInputEmail1">Atendente</label>
		        	  				<select name="atendent" id="atendent" class="form-control form-control-sm">
		        	  					<option value="" selected disabled>Selecione</option>
		        	  					@foreach($data['users'] as $user)
											<option value="{{$user->id}}">{{$user->name}}</option>
		        	  					@endforeach
		        	  				</select>
		        	  				<div id="atendent_error_message"></div>
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

			        	  					<div class="col-lg-10" id="item_div">		
			        	  						<label for="items">Item</label>
					        	    			<input type="text" name="items" id="items" class="form-control form-control-sm"/>
					        	    			<div id="item_error_message"></div>
			        	  					</div> 

			        	  				</div>
			        	  			</div>
			        	  		</div>	      			
			        	  	</div>

			        	  	<div class="form-group">		 
								<textarea class="form-control" name="item_description" id="item_description" cols="10" rows="3" disabled></textarea>
			        	  	</div>

			        	  	<div class="btn-group">
			        	  		<button id="add_item" class="btn btn-sm btn-success" disabled>Adicionar ao Pedido</button>
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
								      	<button type="button" class="input-group-addon btn-success" id="add_total">Adicionar Total</button>					
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
		        <button type="button" class="btn btn-primary send_ajax" id="save_order" value="pendente">Salvar Pedido</button>
				<button type="button" class="btn btn-success send_ajax" id="close_order" value="pago" disabled>Fechar Pedido</button>
		    </div>

    	</div>
  	</div>
</div>
