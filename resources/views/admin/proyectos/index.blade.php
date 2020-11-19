@extends('layouts.admin.app')
@section('title')
Proyectos
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Proyectos</h3> 
	</div>
	<a href="{{ asset('napalm/proyectos/create') }}" class="btn btn-primary">Crear Proyecto</a>
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
				      <th>Pais</th>
				      <th>Región</th>
				      <th>Provincia</th>
				      <th>Comuna</th>
				      <th>Dirección</th>
				      <th>Código Postal</th>
				      <th>Foto Portada</th>
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
		"url": "{{ asset('datatable-proyectos') }}",
		"dataType": "json",
		"type": "POST",
		"data":{ _token: "{{csrf_token()}}"}
	},
		"columns": [
			{ "data": "idProyecto" },
			{ "data": "nombreProyecto" },
			{ "data": "nombrePais" },
			{ "data": "nombreRegion" },
			{ "data": "nombreProvincia" },
			{ "data": "nombreComuna" },
			{ "data": "direccion" },
			{ "data": "codigoPostal" },
			{ "data": "fotoPortada" },
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