@extends('layouts.admin.app')
@section('title')
Propiedades
@endsection
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-12" align="center">
					<h3>Propiedades</h3> 
				</div>
			</div>
			<a href="{{ asset('napalm/propiedades/create') }}" class="btn btn-primary">Crear Propiedad</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
				      <th>Usuario</th>
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
				      <th>Descripcion</th>
				      <th>mConstruido</th>
				      <th>mSuperficie</th>
				      <th>mTerraza</th>
				      <th>Habitaciones</th>
				      <th>Baños</th>
				      <th>Fecha Inicio</th>
				      <th>Fecha Finalizacion</th>
				      <th>Notas Internas</th>
				      <th>Experto Asociado</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  		@foreach($propiedades as $propiedad)
						    <tr>
						      <td>{{ $propiedad->idPropiedad }}</td>
						      <td>{{ $propiedad->nombrePropiedad }}</td>
						      <td>{{ $propiedad->nombrePais }}</td>
						      <td>{{ $propiedad->nombreRegion }}</td>
						      <td>{{ $propiedad->nombreProvincia }}</td>
						      <td>{{ $propiedad->nombreComuna }}</td>
						      <td>{{ $propiedad->direccion1 }} {{ $propiedad->direccion2 }}</td>
						      <td>{{ $propiedad->codigoPostal }}</td>
						      <td>
						      	@if($propiedad->fotoPrincipal != null)
				      			<img src="{{ asset($propiedad->fotoPrincipal) }}" width="100" height="100">
						      	@else
						      		No tiene una imagen asociada
						      	@endif
						      </td>
						      <td>
						      	@if($propiedad->fotoMapa != null)
				      				<img src="{{ asset($propiedad->fotoMapa) }}" width="100" height="100">
						      	@else
									No tiene una imagen asociada
						      	@endif
						      </td>
						      <td>{{ $propiedad->cantidadSubPropiedad }}</td>
						      <td>{{ $propiedad->nombreTipoInversion }}</td>
						      <td>{{ $propiedad->nombre }} {{ $propiedad->apellido }}</td>
						      <td>{{ $propiedad->nombreProyecto }}</td>
						      <td>{{ $propiedad->nombreTipoFlexibilidad }}</td>
						      <td>{{ $propiedad->nombreTipoCredito }}</td>
						      <td>
						      	@if($propiedad->tieneChat == 1)
						      		Si
						      	@else
						      		No
						      	@endif
						      </td>
						      <td>{{ $propiedad->nombreTipoCalidad }}</td>
						      <td>{{ $propiedad->nombreEstado }}</td>
						      <td>${{ $propiedad->precio }}</td>
						      <td>{{ $propiedad->nombreMoneda }}</td>
						      <td>{{ $propiedad->plazoMeses }}</td>
						      <td>%{{ $propiedad->rentabilidadAnual }}</td>
						      <td>%{{ $propiedad->rentabilidadTotal }}</td>
						      <td>{!! substr($propiedad->descripcion,0,-1) !!}</td>
						      <td>{{ $propiedad->mConstruido }}</td>
						      <td>{{ $propiedad->mSuperficie }}</td>
						      <td>{{ $propiedad->mTerraza }}</td>
						      <td>{{ $propiedad->habitaciones }}</td>
						      <td>{{ $propiedad->baños }}</td>
						      <td>{{ $propiedad->fechaInicio }}</td>
						      <td>{{ $propiedad->fechaFinalizacion }}</td>
						      <td>{!! substr($propiedad->notasInternas,0,-1) !!}</td>
						      <td>
						      	@if($propiedad->idExpertoAsociado != null)
						      		Tiene un experto asociado
						      	@else
						      		no tiene experto asociado
						      	@endif
						      </td>
						      <td>
						      		<a href="{{ asset('napalm/propiedades/editar') }}/{{ $propiedad->idPropiedad }}" class="btn btn-info">Editar</a>
		                    		@include('admin.propiedades.destroy')
						      </td>
						    </tr>
						@endforeach
				  </tbody>
				</table>
			</div>
		</div>
		<div class="card-footer">
			
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>    
@endsection