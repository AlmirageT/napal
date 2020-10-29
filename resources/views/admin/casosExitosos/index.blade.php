@extends('layouts.admin.app')
@section('title')
Casos Exitosos
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Casos Exitosos</h3> 
	</div>
	@include('admin.casosExitosos.create')
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="">
			<div class="table-responsive">
				<table class="table project-list-table table-nowrap table-centered table-borderless">
				  <thead>
				    <tr>
			          <th>ID</th>
				      <th>Propiedad</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($casosExitosos as $casoExitoso)
					    <tr>
					      <td>{{ $casoExitoso->idCasoExitoso }}</td>
					      <td>{{ $casoExitoso->nombrePropiedad }}</td>
					      <td>
					      	<div class="dropdown">
		                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
		                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
		                        </a>
		                        <div class="dropdown-menu dropdown-menu">
		                            <a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $casoExitoso->idCasoExitoso }}">Editar</a>
		                            @include('admin.casosExitosos.destroy')
		                        </div>
		                    </div>
					      		
					      </td>
		                    @include('admin.casosExitosos.edit')
					    </tr>
					@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection