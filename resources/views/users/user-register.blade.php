@extends('layouts.admin')

@section('content')
<section class="create-user">
	
	<h1>Cadastrar Funcionário</h1>
	
	<div class="card">
		<div class="card-header">
			Cadastrar
		</div>
		<div class="card-block">
			<form action="/cadastrar-usuario" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
					<label for="">Nome</label>
					<input class="form-control form-control-sm" name="name" type="text">

					@if ($errors->has('name'))
                        <span class="help-block">
                            <div class="form-control-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        </span>
                    @endif
				</div>

				<div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
					<label for="">E-mail</label>
					<input class="form-control form-control-sm" name="email" type="email">
					@if ($errors->has('email'))
                        <span class="help-block">
                            <div class="form-control-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        </span>
                    @endif
				</div>

				<div class="form-group{{ $errors->has('permission') ? ' has-danger' : '' }}">
					<label for="">Perfil</label>
					<div class="">
                        <select name="permission" id="permission" class="form-control form-control-sm">
                            <option selected disabled="" value="">Selecione</option>
                            <option value="1">Administrador</option>
                            <option value="2">Gerente</option>
                            <option value="3">Funcionário</option>
                        </select>
                    </div>
					@if ($errors->has('permission'))
                        <span class="help-block">
                            <div class="form-control-feedback">
                                {{ $errors->first('permission') }}
                            </div>
                        </span>
                    @endif
				</div>

				<div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                    <label for="password" class="col-md-4 control-label">Senha</label>
                    <div class="">
                        <input id="password" type="password" class="form-control form-control-sm" name="password">
                    </div>
					@if ($errors->has('password'))
                        <span class="help-block">
                            <div class="form-control-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                    <label for="password-confirm" class="col-md-4 control-label">Confirmar senha</label>
                    <div class="">
                        <input id="password_confirmation" type="password" class="form-control form-control-sm" name="password_confirmation">
                    </div>
					@if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <div class="form-control-feedback">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        </span>
                    @endif
                </div>

				<button class="btn btn-success" type="submit">Cadastrar</button>
                <a href="/listar-usuarios" class="btn btn-primary">Cancelar</a>
			</form>
		</div>
	</div>
</section>
@stop