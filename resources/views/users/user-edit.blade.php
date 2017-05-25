@extends('layouts.admin')

@section('content')
<section class="edit-user">

    <ol class="breadcrumb panel-heading">
        <li><a href="{{ route('/listar-usuarios') }}">Usuarios</a></li>
        <li class="active">Editar</li>
    </ol>

  
  <h1>Atualização Usuário</h1>
  
  <div class="card">
    <div class="card-header">
      Alterar Usuarios
    </div>
    <div class="card-block">
     
      <form action="{{ route('/update',$user->$id) }}" method="post">
     {{ crs_field() }}
        <input type="hidden" name="_method" value="put">

        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
          <label for="">Nome</label>
          <input class="form-control" name="name" type="text" value="{{$user->name}}">

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
          <input class="form-control" name="email" type="email" value="{{$user->email}}">
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
                        <select name="permission" id="permission" class="form-control" value="{{$user->permission}}">
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
                        <input id="password" type="password" class="form-control" name="password" value="{{$user->password}}">
                    </div>
          @if ($errors->has('password'))
                  <span class="help-block">
                      <div class="form-control-feedback">
                          {{ $errors->first('password') }}
                      </div>
                  </span>
              @endif
          </div>

                <div class="form-group{{ $errors->has('password-confirm') ? ' has-danger' : '' }}">
                    <label for="password-confirm" class="col-md-4 control-label">Confirmar senha</label>
                    <div class="">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{$user->password-confirm}}">
                    </div>
          @if ($errors->has('password-confirm'))
                  <span class="help-block">
                      <div class="form-control-feedback">
                          {{ $errors->first('password-confirm') }}
                      </div>
                  </span>
              @endif
          </div>

        <button class="btn btn-primary" type="submit">Alterar</button>
      </form>
    </div>
  </div>
</section>
@stop