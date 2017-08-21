@extends('layouts.admin')

@section('content')

<div class="container">
	<div class="row">
        <h2>Adicionar Items</h2>
   	</div>
	<div class="form-group">
		<form action="{{route('items.salvar')}}" method="post">
			{{csrf_field()}}
			@include('items._form')	
			<button class="btn btn-primary">Adicionar</button>	
		</form>
		
	</div>
</div>


@endsection