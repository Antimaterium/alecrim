@extends('layouts.admin')

@section('content')
<section class="index">

	
	<h1>Listagem de Pedidos</h1>
	<div class="card">		
		<div class="card-header">
			Pedidos
		</div>
		<div class="card-block">
			<table class="table table-bordered">
				<thead>
					<th>ID</th>
					<th>Atendente</th>
					<th>Numero do Pedido</th>
					<th>Pedido Pago</th>
					<th>Valor Total</th>
					<th>Ações</th>
				</thead>
				<tbody>
					@foreach ($registros as $registro)
						<tr>
							<td> {{ $registro->id }}</td>
							<td> {{ $registro->user_id }}</td>
							<td> {{ $registro->order_table }}</td>
							<td> {{ $registro->order_paid }}</td>
							<td> {{ $registro->order_total }}</td>
							
						</tr>
					@endforeach

				</tbody>
			</table>	

						
					</div>
				</div>
			</div>
		</div>
	</div>	
</section>
@stop