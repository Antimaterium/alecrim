<div class="form-group">
	<label>Nome</label>
	<input type="text" name="item_name" class="form-control form-control-sm" value="{{isset($registro->item_name) ? $registro->item_name : ''}}">
</div>
<div class="form-group">
	<label>Descrição</label>
	<input type="text" name="item_description" class="form-control form-control-sm" value="{{isset($registro->item_description) ? $registro->item_description : ''}}">
</div>
<div class="form-group">
	<label>Produtos</label>
	<input type="text" name="item_produtos" class="form-control form-control-sm" value="{{isset($registro->item_produtos) ? $registro->item_produtos : ''}}">
	<a href="#">Add</a>
</div>
<div class="form-group">
	<label>Categoria</label>
	<input type="text" name="item_categoria"  class="form-control form-control-sm" value="{{isset($registro->item_categoria) ? $registro->item_categoria : ''}}">
</div>
<div class="form-group">
	<label>Valor</label>
	<input type="text" name="item_price"  class="form-control form-control-sm" value="{{isset($registro->item_price) ? $registro->item_price : ''}}">
</div>