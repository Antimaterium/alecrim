@extends('layouts.admin')

@section('content')
<section class="list-products">

	@if(old('nome'))
		<div class="alert alert-success">
			Usuário {{ old('nome') }} foi adicionado com sucesso!
		</div>	
	@endif
	<h1>Listagem de Funcionários</h1>
	<div class="card">		
		<div class="card-header">
			Funcionários
		</div>
		<div class="card-block">
			@if(sizeOf($users_list) === 0)
				<h2 class="text-center">Nenhum funcionário</h2>
			@else
				<table class="table table-bordered table-sm table-hover">
					<thead>
						<th>Nome</th>
						<th>E-mail</th>
						<th>Perfil</th>
						<th>Ações</th>
					</thead>
					<tbody>
						@foreach ($users_list as $user)
							<tr>
								<td> {{ $user->name }}</td>
								<td> {{ $user->email }}</td>
								<td> {{ $user->permission }}</td>

								<td>
									<div class="btn-group">
										<a href="{{ route('users.user-edit',$user->id) }}" class="btn btn-sm btn-outline-warning" value="delete">Editar</a>
										<a href="javascript:(confirm('Deletear esse resgistro?') ? window.location.href='{{route('users.destroy',$user->id)}}' : window.location.href='{{route('user.list')}}')" class="btn btn-sm btn-outline-danger" value="delete">Remover</a>
									</div>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@endif
		</div>
	</div>
	
</section>
@stop