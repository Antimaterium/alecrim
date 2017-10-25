@extends('layouts.admin')

@section('content')
<section class="details_order">
  <div class="card">
    <div class="card-header">
      <h3>Detalhes do Pedido</h3>
    </div>
    <div class="card-block">
      <h4 class="card-title">{{$order->item_name}}</h1>
      <ul class="list-group">
           
          </br>
          <h4 class="card-title">Produtos incluidos no Item:</h4>
            @foreach($order->items as $order)
              <li class="list-group-item">  
                {{$order->item_name}} - {{ $order->item_price }}
              </li>
            @endforeach
         


      <a href="/items/index" class="btn btn-primary">Voltar</a>
</section>
@stop