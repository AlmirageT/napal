@extends('layouts.admin.app')
@section('title')
Usuarios
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Usuarios</h3> 
	</div>
	<a href="{{ asset('napalm/usuarios/create') }}" class="btn btn-primary">Crear Usuario</a>
</div>
	<br>
<div class="row">
	<div class="col-lg-12">
		<div class="">
			<div class="table-responsive">
				<table class="table project-list-table table-nowrap table-centered table-borderless" id="datos">
				  <thead>
				    <tr>
			          <th>ID</th>
				      <th>Nombre</th>
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
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function () {
	$('#datos').DataTable({
		"processing": true,
		"serverSide": true,
		"ajax":{
		"url": "{{ asset('datatable-usuarios') }}",
		"dataType": "json",
		"type": "POST",
		"data":{ _token: "{{csrf_token()}}"}
	},
		"columns": [
			{ "data": "idUsuario" },
			{ "data": "nombre" },
			{ "data": "rut" },
			{ "data": "correo" },
			{ "data": "profesion" },
			{ "data": "nombreIdioma" },
			{ "data": "nombreTipoPersona" },
			{ "data": "rutaAvatar" },
			{ "data": "activarCuenta" },
			{ "data": "activarNewsletter" },
			{ "data": "desactivarCuenta" },
			{ "data": "options" }
		],
		language: {
			"decimal": "",
			"emptyTable": "No hay información",
			"info": "Mostrando _END_ de _TOTAL_ Entradas",
			"infoEmpty": "No existen registros",
			"infoPostFix": "",
			"thousands": ",",
			"lengthMenu": "Mostrar _MENU_ Entradas",
			"loadingRecords": "Cargando...",
			"processing": "Procesando...",
			"search": "Buscar:",
			"zeroRecords": "Sin resultados encontrados",
			"paginate": {
			"first": "Primero",
			"last": "Ultimo",
			"next": "Siguiente",
			"previous": "Anterior"
		}
	},
	});
});
</script>
@endsection