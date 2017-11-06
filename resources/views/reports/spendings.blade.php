@extends('layouts.admin')

@section('content')

<section class="list-products">

	<h1>Relatório de lucros</h1>
	<div class="card">		
		<div class="card-header">
			Relatório
		</div>
		<div class="card-block">
			@if(sizeOf($result) === 0)
				<h2 class="text-center">Nenhum dado a ser exibido</h2>
			@else
				<table class="table table-bordered table-sm table-hover">
					<thead>
						<th>Data</th>
						<th>Custo</th>
						<th>Lucro</th>
						<th>Total</th>
					</thead>
					<tbody>
						@foreach ($result as $value)
							<tr>
								<td> {{ $value['date'] }}</td>
								<td> {{ $value['cost'] }}</td>
								<td> {{ $value['profits'] }}</td>
								<td> {{ $value['total'] }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@endif
			<div class="row">
				<div class="col-md-3 offset-9">
					<strong>Total de custos:</strong> {{$values['totalCost']}} 		
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 offset-9">
					<strong>Total de lucros:</strong> {{$values['totalProfits']}} 	
				</div>
			</div>
		</div>
	</div>
</section>

@stop