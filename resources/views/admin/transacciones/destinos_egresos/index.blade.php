@extends('layouts.admin.app')
@section('title')
Destinos Egresos
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Destinos Egresos</h3> 
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<table class="table table-bordered dt-responsive nowrap" id="datos" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
				  <thead>
				    <tr>
			          <th>ID</th>
				      <th>Monto Egresado</th>
				      <th>Medio de Pago</th>
				      <th>Nombre Usuario</th>
				      <th>Rut</th>
				      <th>Correo</th>
				      <th>Telefono</th>
				      <th>Estado</th>
				      <th>Nombre Banco</th>
				      <th>Nombre Destinatario</th>
				      <th>Código Swift</th>
				      <th>Número de Cuenta</th>
				      <th>Notas</th>
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
		"url": "{{ asset('datatable-destinos-egresos') }}",
		"dataType": "json",
		"type": "POST",
		"data":{ _token: "{{csrf_token()}}"}
	},
		"columns": [
			{ "data": "idDestinoEgreso" },
			{ "data": "monto" },
			{ "data": "idTipoMedioPago" },
			{ "data": "nombre" },
			{ "data": "rut" },
			{ "data": "correo" },
			{ "data": "numero" },
			{ "data": "idEstado" },
			{ "data": "nombreBanco" },
			{ "data": "nombreDestinatario" },
			{ "data": "codigoSwift" },
			{ "data": "numeroCuenta" },
			{ "data": "notas" },
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