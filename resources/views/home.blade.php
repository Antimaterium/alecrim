@extends('layouts.admin')

@section('content')	

	<h1 style="text-align:center">Sistema de Controle e Fluxo de Caixa Alecrim</h1>				
	
	<!-- Button trigger modal -->
	<button type="button" class="btn btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
		<span>Novo pedido</span> <!--<i class="material-icons">add</i>-->
	</button>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	@include('orders._order-modal')	

@stop