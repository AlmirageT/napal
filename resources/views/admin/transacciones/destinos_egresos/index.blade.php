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
		<div class="">
			<form class="app-search d-none d-lg-block">
		        <div class="position-relative">
		            <input type="text" class="form-control" placeholder="Buscador..." id="caja_busqueda">
		            <span class="bx bx-search-alt"></span>
		        </div>
			</form>
			<div class="table-responsive">
				<table class="table project-list-table table-nowrap table-centered table-borderless" id="datos">
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
				  <tbody>
				  	@foreach($destinos_egresos as $destino_egreso)
					    <tr>
					      <td>{{ $destino_egreso->idTrxEgreso }}</td>
					      <td>${{ number_format($destino_egreso->monto,0,',','.') }}</td>
					      <td>{{ $destino_egreso->nombreTipoMedioPago }}</td>
					      <td>{{ $destino_egreso->nombre }} {{ $destino_egreso->apellido }}</td>
					      <td>{{ $destino_egreso->rut }}</td>
					      <td>{{ $destino_egreso->correo }}</td>
					      <td>{{ $destino_egreso->numero }}</td>
					      <td>{{ $destino_egreso->nombreEstado }}</td>
					      <td>{{ $destino_egreso->nombreBanco }}</td>
					      <td>{{ $destino_egreso->nombreDestinatario }}</td>
					      <td>{{ $destino_egreso->codigoSwift }}</td>
					      <td>{{ $destino_egreso->numeroCuenta }}</td>
					      <td>{{ $destino_egreso->notas }}</td>
					      <td>
					      	<div class="dropdown">
		                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
		                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
		                        </a>
		                        <div class="dropdown-menu dropdown-menu">
					      			<a href="{{ asset('napalm/destinos-egresos/detalles') }}/{{ $destino_egreso->idTrxEgreso }}" class="dropdown-item btn btn-warning">Ver Detalles</a>
		                        </div>
		                    </div>
					      </td>
					    </tr>
					@endforeach
				  </tbody>
				</table>
				{{ $destinos_egresos->links() }}
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script>

function buscar_datos(consulta){
	$.ajax({
		url: '{{ asset('buscador-destinos-egresos') }}' ,
		type: 'POST',
		headers: {
			'X-CSRF-TOKEN': '{{ csrf_token() }}'
		},
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datos").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#caja_busqueda', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_datos(valor);
	}else{
		buscar_datos();
	}
});
</script>
@endsection