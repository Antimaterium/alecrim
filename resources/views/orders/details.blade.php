@extends('layouts.admin')

@section('content')
<section class="details_order">
  <div class="card">
    <div class="card-header">
      <h3>Detalhes do Pedido</h3>
    </div>
    <div class="card-block">
      <h4 class="card-title">
        Mesa n°{{$order->order_table}}
        <span class="float-right">Atendente: {{$user->name}}</span>
      </h4> 

      <table width="100%">
        <thead>
          <tr>
            <td>Item</td>
            <td>Qtd x Valor</td>            
            <td>Valor total</td>
        </tr>
        </thead>

        @foreach($order_items as $key => $value)
          <tr>
            <td>{{$value->item_name}}</td>
            <td>
              {{$order_items[$key]->pivot->item_quantity}} x {{$order_items[$key]->item_price}}
            </td>            
            <td>{{$order_items[$key]->pivot->item_quantity * $order_items[$key]->item_price}}</td>            
          </tr>
        @endforeach
      </table>
      <div>
        @if($order->order_status == 'pendente')<h4>Valor Pago: {{$order->order_paid}}</h4>@endif
        <h4>Total:      {{$order->order_total}}</h4>
      </div>
      @if($order->order_status == 'pendente')
        <a href="/pedidos/pendetes" class="btn btn-primary">Voltar</a>
      @else
        <a href="/pedidos/pagos" class="btn btn-primary">Voltar</a>
      @endif
</section>
@stop