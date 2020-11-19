@extends('layouts.admin.app')
@section('title')
Condiciones y Servicios
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Condiciones y Servicios</h3> 
	</div>
	@include('admin.condicionServicio.create')
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="">
			<div class="table-responsive">
				<table class="table project-list-table table-nowrap table-centered table-borderless">
				  <thead>
				    <tr>
			          <th>ID</th>
				      <th>PDF</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($condicionesServicios as $condicionServicio)
					    <tr>
					      <td>{{ $condicionServicio->idCondicionServicio }}</td>
					      <td><a href="{{ asset('condiciones-servicios/documento') }}/{{ $condicionServicio->idCondicionServicio }}">{{ $condicionServicio->nombrePDFCondicionServicio }}</a></td>
					      <td>
					      	<div class="dropdown">
		                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
		                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
		                        </a>
		                        <div class="dropdown-menu dropdown-menu">
					      			<a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $condicionServicio->idCondicionServicio }}">Editar</a>
		                			@include('admin.condicionServicio.destroy')
		                        </div>
		                    </div>
					      </td>
		                    @include('admin.condicionServicio.edit')
					    </tr>
					@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
