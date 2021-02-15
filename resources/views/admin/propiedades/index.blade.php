@extends('layouts.admin.app')
@section('title')
Propiedades
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Propiedades</h3> 
	</div>
	<a href="{{ asset('napalm/propiedades/create') }}" class="btn btn-primary">Crear Propiedad</a>
</div>
<br>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<table class="table table-bordered dt-responsive nowrap" id="datos" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
				      <th>Foto Mapa</th>
				      <th>Sub Propiedades</th>
				      <th>Tipo Inversión</th>
				      <th>Proyecto</th>
				      <th>Tipo FLexibilidad</th>
				      <th>Tipo Credito</th>
				      <th>Tiene Chat</th>
				      <th>Tipo Calidad</th>
				      <th>Estado</th>
				      <th>Precio</th>
				      <th>Moneda</th>
				      <th>Plazo Meses</th>
				      <th>Rentabilidad Anual</th>
				      <th>Rentabilidad Total</th>
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
		"url": "{{ asset('datatable-propiedades') }}",
		"dataType": "json",
		"type": "POST",
		"data":{ _token: "{{csrf_token()}}"}
	},
		"columns": [
			{ "data": "idPropiedad" },
			{ "data": "nombrePropiedad" },
			{ "data": "nombrePais" },
			{ "data": "nombreRegion" },
			{ "data": "nombreProvincia" },
			{ "data": "nombreComuna" },
			{ "data": "direccion" },
			{ "data": "codigoPostal" },
			{ "data": "fotoPrincipal" },
			{ "data": "fotoMapa" },
			{ "data": "cantidadSubPropiedad" },
			{ "data": "nombreTipoInversion" },
			{ "data": "nombreProyecto" },
			{ "data": "nombreTipoFlexibilidad" },
			{ "data": "nombreTipoCredito" },
			{ "data": "tieneChat" },
			{ "data": "nombreTipoCalidad" },
			{ "data": "nombreEstado" },
			{ "data": "precio" },
			{ "data": "nombreMoneda" },
			{ "data": "plazoMeses" },
			{ "data": "rentabilidadAnual" },
			{ "data": "rentabilidadTotal" },
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