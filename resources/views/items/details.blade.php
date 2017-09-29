@extends('layouts.admin')

@section('content')
<section class="details">
  <div class="card">
    <div class="card-header">
      <h3>Detalhes do Item</h3>
    </div>
    <div class="card-block">
      <h4 class="card-title">{{$item->item_name}}</h1>
      <ul class="list-group">
        <li class="list-group-item">Descrição: {{$item->item_description}}</li>
        <li class="list-group-item">Categoria: {{$item->item_category}}</li>  
        <li class="list-group-item">Valor: {{$item->item_price}}</li>               
          </br>
          <h4 class="card-title">Produtos incluidos no Item:</h4>
            @foreach($item->products as $product)
              <li class="list-group-item">  
                {{$product->product_name}} - {{ $product->product_price }}
              </li>
            @endforeach
         


      <a href="/items/index" class="btn btn-primary">Voltar</a>
</section>
@stop