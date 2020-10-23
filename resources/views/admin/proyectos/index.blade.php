@extends('layouts.admin.app')
@section('title')
Proyectos
@endsection
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-12" align="center">
					<h3>Proyectos</h3> 
				</div>
			</div>
			<a href="{{ asset('napalm/proyectos/create') }}" class="btn btn-primary">Crear Proyecto</a>
		</div>
		<div class="card-body">
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
			      <th>Acciones</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($proyectos as $proyecto)
				    <tr>
				      <td>{{ $proyecto->idProyecto }}</td>
				      <td>{{ $proyecto->nombreProyecto }}</td>
				      <td>{{ $proyecto->nombrePais }}</td>
				      <td>{{ $proyecto->nombreRegion }}</td>
				      <td>{{ $proyecto->nombreProvincia }}</td>
				      <td>{{ $proyecto->nombreComuna }}</td>
				      <td>{{ $proyecto->direccion }}</td>
				      <td>{{ $proyecto->codigoPostal }}</td>
				      <td>
				      	@if($proyecto->fotoPortada != null)
				      		<img src="{{ asset($proyecto->fotoPortada) }}" width="100" height="100">
				      	@else
				      		No tiene imagen
				      	@endif
				      </td>
				      <td>
				      		<a href="{{ asset('napalm/proyectos/editar') }}/{{ $proyecto->idProyecto }}" class="btn btn-info">Editar</a>
                    		@include('admin.proyectos.destroy')
				      </td>
				    </tr>
				@endforeach
			  </tbody>
			</table>
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