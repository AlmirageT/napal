@extends('layouts.admin.app')
@section('title')
Trx Egresos
@endsection
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-12" align="center">
					<h3>Trx Egresos</h3> 
				</div>
			</div>
		</div>
		<div class="card-body">
			<form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Buscador..." id="caja_busqueda" onchange="buscar_datos(this.value)">
                    <span class="bx bx-search-alt"></span>
                </div>
        	</form>
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
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($egresos as $egreso)
					    <tr>
					      <td>{{ $egreso->idTrxEgreso }}</td>
					      <td>${{ number_format($egreso->monto,0,',','.') }}</td>
					      <td>{{ $egreso->webClient }}</td>
					      <td>{{ $egreso->nombre }} {{ $egreso->apellido }}</td>
					      <td>{{ $egreso->rut }}</td>
					      <td>{{ $egreso->correo }}</td>
					      <td>{{ $egreso->numero }}</td>
					      <td>{{ $egreso->nombreMoneda }}</td>
					      <td>
					      	<div class="dropdown">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu">
					      			<a class="dropdown-item btn btn-warning">Ver Detalles</a>
                                </div>
                            </div>
					      </td>
					    </tr>
					@endforeach
				  </tbody>
				</table>
				{{ $egresos->links() }}
			</div>
		</div>
		<div class="card-footer">
			
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script>

function buscar_datos(consulta){
	$.ajax({
		url: '{{ asset('buscador-egresos') }}' ,
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