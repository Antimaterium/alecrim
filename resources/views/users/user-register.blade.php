@extends('layouts.admin')

@section('content')
<section class="create-user">
	
	<h1>Cadastrar Funcionário</h1>
	
	<div class="card">
		<div class="card-header">
			Cadastrar
		</div>
		<div class="card-block">
			<form id="formUserRegister" action="/cadastrar-usuario" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
					<label for="">Nome</label>
					<input class="form-control form-control-sm" name="name" id="name" type="text">

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
					<input class="form-control form-control-sm" name="email" id="email" type="email">
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
                        <input type="password" class="form-control form-control-sm" name="password" id="password">
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
                        <input type="password" class="form-control form-control-sm" name="password_confirmation" id="password_confirmation">
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

@section('project-scripts')
<script>
    $(document).ready(function(){

        $('#formUserRegister').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 10,
                    maxlength: 100
                },
                email: {
                    required: true,
                    email: true
                },
                permission: {
                    required: true,
                },
                password: {
                    required: true,
                    minlength: 8,
                },
                password_confirmation: {
                    required: true,
                    minlength: 8,
                    equalTo: "#password"
                }
            },
            messages: {
                name: {
                    required: "Campo obrigatório",
                    minlength: "No mínimo 10 caractéres",
                    maxlength: "No máximo 100 caractéres"
                },
                email: {
                    required: "Campo obrigatório",
                    email: "Digite um e-mail válido"
                },
                permission: {
                    required: "Selecione uma opção"
                },
                password: {
                    required: "Campo obrigatório",
                    minlength: "No mínimo 8 caractéres",
                },
                password_confirmation: {              
                    required: "Campo obrigatório",
                    minlength: "No mínimo 8 caractéres",
                    equalTo: "Campo senha não coincide"
                }

            }
        });

    });
</script>
@stop

@stop