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
                <div class="row">
					<div class="col-lg-10">
						<div class="form-group {{ $errors->has('product_name') ? 'has-danger' : '' }}">
							<label for="product_name">Nome</label>
							<input class="form-control form-control-sm" id="product_name" name="product_name" value="{{$product->product_name}}" type="text">
							@if($errors->has('product_name'))
		                        <span class="help-block">
		                            <div class="form-control-feedback">
		                                {{ $errors->first('product_name') }}
		                            </div>
		                        </span>
		                    @endif
	                   </div>
                    </div>
                    <div class="col-lg-2">
						<div class="form-group {{ $errors->has('product_price') ? 'has-danger' : '' }}">
							<label for="product_price">Valor de venda</label>
							<input class="form-control form-control-sm" name="product_price" id="product_price" value="{{$product->product_purchase_price}}" type="text">
							@if($errors->has('product_price'))
			                    <span class="help-block">
			                        <div class="form-control-feedback">
			                            {{ $errors->first('product_price') }}
			                        </div>
			                    </span>
			                @endif
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group {{ $errors->has('product_description') ? 'has-danger' : '' }}">
							<label for="product_description">Descrição</label>
							<textarea class="form-control form-control-sm" name="product_description" id="product_description" value="{{$product->product_description}}" type="text">
{{$product->product_description}}
							</textarea> 
							@if($errors->has('product_description'))
		                        <span class="help-block">
		                            <div class="form-control-feedback">
		                                {{ $errors->first('product_description') }}
		                            </div>
		                        </span>
		                    @endif
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-2">
						<div class="form-group {{ $errors->has('product_acceptable_minimum_quantity') ? 'has-danger' : '' }}">
							<label for="product_acceptable_minimum_quantity">Qtd. mínima</label>
							<input class="form-control form-control-sm" name="product_acceptable_minimum_quantity" id="product_acceptable_minimum_quantity" value="{{$product->product_acceptable_minimum_quantity}}" type="number">
							@if($errors->has('product_acceptable_minimum_quantity'))
		                        <span class="help-block">
		                            <div class="form-control-feedback">
		                                {{ $errors->first('product_acceptable_minimum_quantity') }}
		                            </div>
		                        </span>
		                    @endif
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group {{ $errors->has('product_packing') ? 'has-danger' : '' }}">
							<label for="product_packing">Tipo de embalagem</label>
							<select name="product_packing" id="product_packing" class="form-control form-control-sm">
								<option>{{$product->product_packing}}</option>
								<option value="Caixa">Caixa</option>
								<option value="Pacote">Pacote</option>
								<option value="Peça">Peça</option>
							</select>
							@if($errors->has('product_packing'))
		                        <span class="help-block">
		                            <div class="form-control-feedback">
		                                {{ $errors->first('product_packing') }}
		                            </div>
		                        </span>
		                    @endif
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group {{ $errors->has('product_quantity') ? 'has-danger' : '' }}">
							<label for="product_quantity">Quantidade(unit.)</label>
							<input class="form-control form-control-sm" name="product_quantity" id="product_quantity" value="{{$product->product_quantity}}" type="number">
							@if($errors->has('product_quantity'))
		                        <span class="help-block">
		                            <div class="form-control-feedback">
		                                {{ $errors->first('product_quantity') }}
		                            </div>
		                        </span>
		                    @endif
						</div>
					</div>					
					<div class="col-lg-2">
						<div class="form-group {{ $errors->has('product_purchase_price') ? 'has-danger' : '' }}">
							<label for="product_purchase_price">Valor de compra</label>
							<input class="form-control form-control-sm" name="product_purchase_price" id="product_purchase_price" value="{{$product->product_price}}" type="text">
							@if($errors->has('product_purchase_price'))
		                        <span class="help-block">
		                            <div class="form-control-feedback">
		                                {{ $errors->first('product_purchase_price') }}
		                            </div>
		                        </span>
		                    @endif
						</div>
					</div>	
					<div class="col-lg-2">
						<label for="">Custo por un.</label>
						<div id="unit_price"></div>
					</div>								
				</div>
				<fieldset>
					<legend><h3>Fornecedor</h3></legend>
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group {{ $errors->has('provider_name') ? 'has-danger' : '' }}">
								<label for="provider_name">Nome</label>
								<input type="text" class="form-control form-control-sm" id="provider_name" name="provider_name">
								@if($errors->has('provider_name'))
			                        <span class="help-block">
			                            <div class="form-control-feedback">
			                                {{ $errors->first('provider_name') }}
			                            </div>
			                        </span>
			                    @endif
							</div>
						</div>
				<button class="btn btn-success" type="submit">Salvar</button>
				<a href="/lista-produtos" class="btn btn-primary">Cancelar</a>
			</form>
		</div>
	</div>
</section>
@stop