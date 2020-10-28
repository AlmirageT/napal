@extends('layouts.admin.app')
@section('title')
Provincias
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Provincias</h3> 
	</div>
	@include('admin.ubicaciones.provincias.create')
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
				      <th>Región</th>
				      <th>Pais</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($provincias as $provincia)
					    <tr>
					      <td>{{ $provincia->idProvincia }}</td>
					      <td>{{ $provincia->nombreProvincia }}</td>
					      <td>{{ $provincia->nombreRegion }}</td>
					      <td>{{ $provincia->nombrePais }}</td>
					      <td>
					      	<div class="dropdown">
		                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
		                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
		                        </a>
		                        <div class="dropdown-menu dropdown-menu">
		                            <a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $provincia->idProvincia }}">Editar</a>
		                            @include('admin.ubicaciones.provincias.destroy')
		                        </div>
		                    </div>
					      		
					      </td>
		                    @include('admin.ubicaciones.provincias.edit')
					    </tr>
					@endforeach
				  </tbody>
				</table>
			</div>
			{{ $provincias->links() }}
		</div>
	</div>
</div>
@endsection