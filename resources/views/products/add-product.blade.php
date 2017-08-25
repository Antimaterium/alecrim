@extends('layouts.admin')

@section('content')
<section class="add-product">
	<h1>Cadastrar produtos</h1>
	
	<div class="card">
		<div class="card-header">
			Adicionar
		</div>
		<div class="card-block">
			<form action="/adiciona-produtos" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group {{ $errors->has('product_name') ? 'has-danger' : '' }}">
					<label for="">Nome</label>
					<input class="form-control form-control-sm" name="product_name" type="text">
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
					<input class="form-control form-control-sm" name="product_price" type="text">
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
					<input class="form-control form-control-sm" name="product_quantity" type="text">
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
					<textarea class="form-control form-control-sm" name="product_description" type="text"></textarea> 
					@if ($errors->has('product_description'))
                        <span class="help-block">
                            <div class="form-control-feedback">
                                {{ $errors->first('product_description') }}
                            </div>
                        </span>
                    @endif
				</div>
				<button class="btn btn-success" type="submit">Adicionar</button>
				<a href="/lista-produtos" class="btn btn-primary">Cancelar</a>
			</form>
		</div>
	</div>
</section>
@stop