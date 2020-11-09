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
			<div class="app-search d-none d-lg-block">
		        <div class="position-relative">
		            <input type="text" class="form-control" placeholder="Buscador..." id="caja_busqueda" onchange="buscar_datos(this.value)">
		            <span class="bx bx-search-alt"></span>
		        </div>
			</div>
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
				  <tbody>
				  	@foreach($ingresos as $ingreso)
					    <tr>
					      <td>{{ $ingreso->idTrxIngreso }}</td>
					      <td>${{ number_format($ingreso->monto,0,',','.') }}</td>
					      <td>{{ $ingreso->webClient }}</td>
					      <td>{{ $ingreso->nombre }} {{ $ingreso->apellido }}</td>
					      <td>{{ $ingreso->rut }}</td>
					      <td>{{ $ingreso->correo }}</td>
					      <td>{{ $ingreso->numero }}</td>
					      <td>{{ $ingreso->nombreMoneda }}</td>
					      <td>{{ $ingreso->nombreEstado }}</td>
					      <td>{{ $ingreso->nombreTipoMedioPago }}</td>
					      <td>
					      	<div class="dropdown">
		                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
		                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
		                        </a>
		                        <div class="dropdown-menu dropdown-menu-right">
					      			<a href="{{ asset('napalm/ingresos/detalles') }}/{{ $ingreso->idTrxIngreso }}" class="dropdown-item btn btn-warning">Ver Detalles</a>
		                        </div>
		                    </div>
					      </td>
					    </tr>
					@endforeach
				  </tbody>
				</table>
				{{ $ingresos->links() }}
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script>

function buscar_datos(consulta){
	$.ajax({
		url: '{{ asset('buscador-prueba') }}' ,
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
