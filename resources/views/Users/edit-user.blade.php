@extends('layouts.admin')

@section('content')
<section class="create-user">
	@if(sizeof($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $erro)
					<li>{{$erro}}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<h1>Cadastrar Usuário</h1>
	
	<div class="card">
		<div class="card-header">
			Cadastrar
		</div>
		<div class="card-block">
			<form action="/lista-usuarios/{{id}}/edita" method="put">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group">
					<label for="">Nome</label>
					<input class="form-control" name="name" type="text">
				</div>

				<div class="form-group">
					<label for="">E-mail</label>
					<input class="form-control" name="email" type="email">
				</div>

				<div class="form-group">
					<label for="">Perfil</label>
					<div class="">
                        <select name="permission" id="permission" class="form-control">
                            <option selected disabled="" value="">Selecione</option>
                            <option value="1">Administrador</option>
                            <option value="2">Gerente</option>
                            <option value="3">Funcionário</option>
                        </select>
                    </div>
				</div>

				<div class="form-group">
                    <label for="password" class="col-md-4 control-label">Senha</label>
                    <div class="">
                        <input id="password" type="password" class="form-control" name="password">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 control-label">Confirmar senha</label>
                    <div class="">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>

				<button class="btn btn-primary" type="submit">Cadastrar</button>
			</form>
		</div>
	</div>
</section>
@stop