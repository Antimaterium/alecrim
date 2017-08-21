@extends('layouts.admin')

@section('content')	

	<h1 style="text-align:center">Sistema de Controle e Fluxo de Caixa Alecrim</h1>				
	
	<!-- Button trigger modal -->
	<button type="button" class="btn btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
		<span>Novo pedido</span> <!--<i class="material-icons">add</i>-->
	</button>

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
						        	    	<label for="name">Item</label>
						        	    	<input type="text" class="form-control form-control-sm" name="name" id="name" placeholder="Digite o nome do item">
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
				        	  		<button class="btn btn-sm btn-success">Adicionar ao Pedido</button>
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
@stop