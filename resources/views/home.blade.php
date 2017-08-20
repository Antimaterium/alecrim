@extends('layouts.admin')

@section('content')
	<h1 style="text-align:center">Sistema de Controle e Fluxo de Caixa Alecrim</h1>				
	
	<!-- Button trigger modal -->
	<button type="button" class="btn btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
		<span>Novo pedido</span> <!--<i class="material-icons">add</i>-->
	</button>

	<!-- Modal -->
	<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Criar novo pedido</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
	        <button type="button" class="btn btn-primary">Fechar Pedido</button>
	      </div>
	    </div>
	  </div>
	</div>
@stop