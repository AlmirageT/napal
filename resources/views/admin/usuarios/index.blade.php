@extends('layouts.admin.app')
@section('title')
Usuarios
@endsection
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-12" align="center">
					<h3>Usuarios</h3> 
				</div>
			</div>
			<a href="{{ asset('napalm/usuarios/create') }}" class="btn btn-primary">Crear Usuario</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
				  <thead>
				    <tr>
			          <th>ID</th>
				      <th>Nombre</th>
				      <th>Apellido</th>
				      <th>Rut</th>
				      <th>Correo</th>
				      <th>Profesión</th>
				      <th>Idioma</th>
				      <th>Tipo Persona</th>
				      <th>Avatar</th>
				      <th>¿Cuenta Activada?</th>
				      <th>Newsletter</th>
				      <th>¿Cuenta Desactivada?</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($usuarios as $usuario)
					    <tr>
					      <td>{{ $usuario->idUsuario }}</td>
					      <td>{{ $usuario->nombre }}</td>
					      <td>{{ $usuario->apellido }}</td>
					      <td>{{ $usuario->rut }}</td>
					      <td>{{ $usuario->correo }}</td>
					      <td>{{ $usuario->profesion }}</td>
					      <td>{{ $usuario->nombreIdioma }}</td>
					      <td>{{ $usuario->nombreTipoPersona }}</td>
					      <td>
					      	@if($usuario->idAvatar != null)
					      	<img src="{{ asset($usuario->rutaAvatar) }}" width="100" height="100">
					      	@else
					      	No tiene imagen
					      	@endif
					      </td>
					      <td>
					      	@if($usuario->activarCuenta == 0)
					      		Esta cuenta aun no se activa
					      	@else
					      		Cuenta Activada
					      	@endif
					      </td>
					      <td>
					      	@if($usuario->activarNewsletter == 0)
					      		Sin Newsletter
					      	@else
					      		Con Newsletter
					      	@endif
					      </td>
					      <td>
					      	@if($usuario->desactivarCuenta == 0)
					      		No
					      	@else
					      		Si
					      	@endif
					      </td>
					      <td>
					      		<a href="{{ asset('napalm/usuarios/editar') }}/{{ $usuario->idUsuario }}" class="btn btn-info">Editar</a>
	                    		@include('admin.usuarios.destroy')
					      </td>
					    </tr>
					@endforeach
				  </tbody>
				</table>
			</div>
		</div>
		<div class="card-footer">
			
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>    
@endsection