

  <!-- Inclusão do jQuery -->
  <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
  <!-- Inclusão do Plugin jQuery Validation-->
  <script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>


<div class="form-group {{ $errors->has('item_name') ? 'has-danger' : '' }}">
	<p>
	<label>Nome</label>
	<input placeholder="Digite o nome do Item" type="text" name="item_name" class="form-control form-control-sm" value="{{isset($registro->item_name) ? $registro->item_name : ''}}">
	@if ($errors->has('item_name'))
	    <span class="help-block">
	        <div class="form-control-feedback">
	            {{ $errors->first('item_name') }}
	        </div>
	    </span>
	@endif
</div>




<div class="form-group {{ $errors->has('item_description') ? 'has-danger' : '' }}">
	<label>Descrição</label>
	<input placeholder="Digite a Descrição" type="text" name="item_description" class="form-control form-control-sm" value="{{isset($registro->item_description) ? $registro->item_description : ''}}">
	@if ($errors->has('item_description'))
	    <span class="help-block">
	        <div class="form-control-feedback">
	            {{ $errors->first('item_description') }}
	        </div>
	    </span>
	@endif
</div>
<div class="form-group">
	<label>Produtos</label>
	<input placeholder="selecione os produtos" type="text" name="item_produtos" class="form-control form-control-sm" value="{{isset($registro->item_produtos) ? $registro->item_produtos : ''}}">
	<a href="#">Add</a>
</div>
<div class="form-group {{ $errors->has('item_categoria') ? 'has-danger' : '' }}">
	<label>Categoria</label>
	<input placeholder="Digite a Categoria" type="text" name="item_categoria"  class="form-control form-control-sm" value="{{isset($registro->item_categoria) ? $registro->item_categoria : ''}}">
	@if ($errors->has('item_categoria'))
	    <span class="help-block">
	        <div class="form-control-feedback">
	            {{ $errors->first('item_categoria') }}
	        </div>
	    </span>
	@endif
</div>
<div class="form-group {{ $errors->has('item_price') ? 'has-danger' : '' }}">
	<label>Valor</label>
	<input placeholder="Entre com o valor do Item" type="text" name="item_price"  class="form-control form-control-sm" value="{{isset($registro->item_price) ? $registro->item_price : ''}}">
	@if ($errors->has('item_price'))
	    <span class="help-block">
	        <div class="form-control-feedback">
	            {{ $errors->first('item_price') }}
	        </div>
	    </span>
	@endif
</div>