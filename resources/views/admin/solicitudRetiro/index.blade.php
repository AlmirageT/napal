@extends('layouts.admin.app')
@section('title','Solicitud Retiro de Fondos')
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Solicitud Retiro de Fondos</h3> 
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
				      <th>Concepto</th>
				      <th>Importe</th>
				      <th>Usuario Solicitante</th>
				      <th>Solicitud Validada</th>
				      <th>Banco</th>
				      <th>Tipo Cuenta</th>
				      <th>Número Cuenta</th>
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
		"url": "{{ asset('datatable-solicitud-retiro-fondos') }}",
		"dataType": "json",
		"type": "POST",
		"data":{ _token: "{{csrf_token()}}"}
	},
		"columns": [
			{ "data": "idIntruccionBancaria" },
			{ "data": "concepto" },
			{ "data": "importe" },
			{ "data": "nombre" },
			{ "data": "validado" },
			{ "data": "nombreBanco" },
			{ "data": "nombreTipoCuenta" },
			{ "data": "numeroCuenta" },
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