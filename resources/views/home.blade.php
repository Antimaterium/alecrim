@extends('layouts.admin')

@section('content')	
	
	<h1 style="text-align:center">Sistema de Controle e Fluxo de Caixa Alecrim</h1>				
	<div id="content_tables">
		@foreach($openOrders as $key => $value)
		<div  class="table_order" onclick="openOrder({{ $value }})">
			<span>{{$value->order_table}}</span>
			<img src="img/icons/cutlery.svg" alt="order" class="order_image">
		</div>
		@endforeach
	</div>	

	<!-- Button trigger modal -->
	<button 
		type="button" 
		class="btn btn btn-primary" 
		data-toggle="modal" 
		id="btn_open_order_modal" 
		data-target="#order_modal">
		<i class="material-icons">add</i>
	</button>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	@include('orders._order-modal')	

	<script>
		function openOrder(obj){
			console.log(obj);
		}
	</script>

@stop