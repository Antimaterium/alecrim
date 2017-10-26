@extends('layouts.admin')

@section('content')
<section class="list-products">

	<h1>Listagem de pedidos</h1>
	<div class="card">		
		<div class="card-header">
			Pedidos
		</div>
		<div class="card-block">
			@if(sizeOf($order_list) === 0)
				<h2 class="text-center">Nenhum pedido</h2>
			@else
				<table class="table table-bordered table-sm table-hover">
					<thead>
						<th>Pedido</th>
						<th>Mesa</th>
						<th>Pago</th>
						<th>Total</th>
						<th>Status</th>
						<th>Ações</th>
					</thead>
					<tbody>
						@foreach ($order_list as $order)
							<tr>
								<td> {{ $order->id }}</td>
								<td> {{ $order->order_table }}</td>
								<td> {{ $order->order_paid }}</td>
								<td> {{ $order->order_total }}</td>
								<td> {{ ucfirst($order->order_status) }}</td>
								<td>
									<div class="btn-group">
										<a href="{{ route('product.edit',$order->id) }}" class="btn btn-sm btn-outline-warning">Editar</a>	
										<a href="javascript:(confirm('Apagar esse pedido?') ? window.location.href='{{route('order.destroy',$order->id)}}' : window.location.href='{{route('orders.paid')}}')" class="btn btn-sm btn-outline-danger" value="delete">Apagar</a>
										<a href="{{ route('orders.details',$order->id) }}" class="btn btn-sm btn-outline-warning">Detalhes</a>	
									</div>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@endif

			<nav aria-label="Page navigation example">
			  <ul class="pagination">
			  	@foreach($order_list->links() as $link)
			    	<li class="page-item">
			    		<a class="page-link" href="#">{{ $link }}</a>
		    		</li>
			    @endforeach
			  </ul>
			</nav>
		</div>
	</div>
	
</section>
@stop