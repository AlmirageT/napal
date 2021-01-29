@extends('layouts.admin.app')
@section('title')
Fecha de Propiedades
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Fecha de Propiedades</h3> 
	</div>
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
				      <th>Foto Portada</th>
				      <th>Foto Mapa</th>
				      <th>Proyecto</th>
				      <th>Tipo FLexibilidad</th>
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
		"url": "{{ asset('datatable-propiedades-fecha-propiedad') }}",
		"dataType": "json",
		"type": "POST",
		"data":{ _token: "{{csrf_token()}}"}
	},
		"columns": [
			{ "data": "idPropiedad" },
			{ "data": "nombrePropiedad" },
			{ "data": "fotoPrincipal" },
			{ "data": "fotoMapa" },
			{ "data": "nombreProyecto" },
			{ "data": "nombreTipoFlexibilidad" },
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