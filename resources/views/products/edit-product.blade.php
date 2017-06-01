@extends('layouts.admin')

@section('content')
<section class="add-product">
	<h1>Editar produto</h1>
	
	<div class="card">
		<div class="card-header">
			Adicionar
		</div>
		<div class="card-block">
			<form action="{{ route('product.update', $product->id) }}" method="post">

				<input type="hidden" name="_method" value="put">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group {{ $errors->has('product_name') ? 'has-danger' : '' }}">
					<label for="">Nome</label>
					<input class="form-control" name="product_name" value="{{ $product->product_name }}" type="text">
					@if ($errors->has('product_name'))
                        <span class="help-block">
                            <div class="form-control-feedback">
                                {{ $errors->first('product_name') }}
                            </div>
                        </span>
                    @endif
				</div>
				<div class="form-group {{ $errors->has('product_price') ? 'has-danger' : '' }}">
					<label for="">Valor</label>
					<input class="form-control" name="product_price" value="{{ $product->product_price }}" type="text">
					@if ($errors->has('product_price'))
                        <span class="help-block">
                            <div class="form-control-feedback">
                                {{ $errors->first('product_price') }}
                            </div>
                        </span>
                    @endif
				</div>
				<div class="form-group {{ $errors->has('product_quantity') ? 'has-danger' : '' }}">
					<label for="">Quantidade</label>
					<input class="form-control" name="product_quantity" value="{{ $product->product_quantity }}" type="text">
					@if ($errors->has('product_quantity'))
                        <span class="help-block">
                            <div class="form-control-feedback">
                                {{ $errors->first('product_quantity') }}
                            </div>
                        </span>
                    @endif
				</div>
				<div class="form-group {{ $errors->has('product_description') ? 'has-danger' : '' }}">
					<label for="">Descrição</label>
					<textarea class="form-control" name="product_description">
						{{ $product->product_description }}
					</textarea> 
					@if ($errors->has('product_description'))
                        <span class="help-block">
                            <div class="form-control-feedback">
                                {{ $errors->first('product_description') }}
                            </div>
                        </span>
                    @endif
				</div>
				<button class="btn btn-success" type="submit">Salvar</button>
				<a href="/lista-produtos" class="btn btn-primary">Cancelar</a>
			</form>
		</div>
	</div>
</section>
@stop