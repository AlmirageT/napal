@extends('layouts.admin.app')
@section('title')
Comunas
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Comunas</h3> 
	</div>
	@include('admin.ubicaciones.comunas.create')
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="">
			<div class="table-responsive">
				<table class="table project-list-table table-nowrap table-centered table-borderless">
				  <thead>
				    <tr>
			          <th>ID</th>
				      <th>Nombre</th>
				      <th>Provincia</th>
				      <th>Región</th>
				      <th>Comuna</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($comunas as $comuna)
					    <tr>
					      <td>{{ $comuna->idComuna }}</td>
					      <td>{{ $comuna->nombreComuna }}</td>
					      <td>{{ $comuna->nombreProvincia }}</td>
					      <td>{{ $comuna->nombreRegion }}</td>
					      <td>{{ $comuna->nombrePais }}</td>
					      <td>
					      	<div class="dropdown">
		                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
		                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
		                        </a>
		                        <div class="dropdown-menu dropdown-menu">
		                            <a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $comuna->idComuna }}">Editar</a>
		                            @include('admin.ubicaciones.comunas.destroy')
		                        </div>
		                    </div>
					      		
					      </td>
		                    @include('admin.ubicaciones.comunas.edit')
					    </tr>
					@endforeach
				  </tbody>
				</table>
			</div>
			{{ $comunas->links() }}
		</div>
	</div>
</div>
@endsection