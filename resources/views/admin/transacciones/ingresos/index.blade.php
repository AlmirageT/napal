@extends('layouts.admin.app')
@section('title')
Trx Ingresos
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Trx Ingresos</h3> 
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="">
			<div class="table-responsive">
				<table class="table project-list-table table-nowrap table-centered table-borderless" id="datos">
				  <thead>
				    <tr>
			          <th>ID</th>
				      <th>Monto</th>
				      <th>webClient</th>
				      <th>Nombre Usuario</th>
				      <th>Rut</th>
				      <th>Correo</th>
				      <th>Télefono</th>
				      <th>Moneda</th>
				      <th>Estado</th>
				      <th>Medio Pago</th>
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
		"url": "{{ asset('datatable-ingresos') }}",
		"dataType": "json",
		"type": "POST",
		"data":{ _token: "{{csrf_token()}}"}
	},
		"columns": [
			{ "data": "idTrxIngreso" },
			{ "data": "monto" },
			{ "data": "webClient" },
			{ "data": "nombre" },
			{ "data": "rut" },
			{ "data": "correo" },
			{ "data": "numero" },
			{ "data": "nombreEstado" },
			{ "data": "nombreTipoMedioPago" },
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
