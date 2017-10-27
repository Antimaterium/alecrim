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
            <td>Valor</td>
        </tr>
        </thead>

        @foreach($order_items as $key => $value)
          <tr>
            <td>{{$value->item_name}}</td>
            <td>
              <!-- {{$order_items[$key]->pivot->item_quantity}} -->

              <?php #dd($order_items[$key]) ?>
            </td>
            <td></td>
          </tr>
        @endforeach
      </table>
        


      <a href="/items/index" class="btn btn-primary">Voltar</a>
</section>
@stop