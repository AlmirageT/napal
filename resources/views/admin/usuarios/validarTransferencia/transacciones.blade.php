@extends('layouts.admin.app')
@section('title')
Validación Transferencias
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Validación Transferencias</h3> 
	</div>
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header" align="center">
				<h3>Usuario</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Rut</label>
							<input type="text" disabled="" name="rut" class="form-control" value="{{ $usuario->rut }}">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" name="nombre" disabled="" class="form-control" value="{{ $usuario->nombre }} {{ $usuario->apellido }}">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('admin.usuarios.validarTransferencia.create')
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
				      <th>Nombre Banco Origen</th>
				      <th>Número Operación</th>
				      <th>Banco Origen</th>
				      <th>Monto Depósito</th>
				      <th>Fecha Depósito</th>
				      <th>Número Cuenta Banco</th>
				      <th>Validado</th>
				      <th>Imagen</th>
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
		"url": "{{ asset('datatable-transacciones') }}/{{ $usuario->idUsuario }}",
		"dataType": "json",
		"type": "POST",
		"data":{ _token: "{{csrf_token()}}"}
	},
		"columns": [
			{ "data": "idTrxDepoTransf" },
			{ "data": "nombreBancoOrigen" },
			{ "data": "numeroOperacion" },
			{ "data": "bancoOrigen" },
			{ "data": "montoDeposito" },
			{ "data": "fechaDeposito" },
			{ "data": "numeroCuentaBanco" },
			{ "data": "validado" },
			{ "data": "rutaImagen" },
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