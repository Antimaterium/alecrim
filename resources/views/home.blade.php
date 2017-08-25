@extends('layouts.admin')

@section('content')	

	<h1 style="text-align:center">Sistema de Controle e Fluxo de Caixa Alecrim</h1>				
	
	<!-- Button trigger modal -->
	<button type="button" class="btn btn btn-primary" data-toggle="modal" data-target="#order_modal">
		<span>Novo pedido</span> <!--<i class="material-icons">add</i>-->
	</button>

	@include('orders._order-modal')	

@stop