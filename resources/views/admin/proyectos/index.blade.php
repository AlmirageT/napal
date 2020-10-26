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
			<div class="table-responsive">
				<table class="table project-list-table table-nowrap table-centered table-borderless">
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
					      	<div class="dropdown">
	                            <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
	                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
	                            </a>
	                            <div class="dropdown-menu dropdown-menu">
					      			<a href="{{ asset('napalm/proyectos/editar') }}/{{ $proyecto->idProyecto }}" class="dropdown-item btn btn-info">Editar</a>
	                    			@include('admin.proyectos.destroy')
	                            </div>
	                        </div>
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