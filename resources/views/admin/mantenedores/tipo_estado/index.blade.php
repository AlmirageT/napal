@extends('layouts.admin.app')
@section('title')
Tipos Estados
@endsection
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-12" align="center">
					<h3>Tipos Estados</h3> 
				</div>
			</div>
			@include('admin.mantenedores.tipo_estado.create')
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table project-list-table table-nowrap table-centered table-borderless">
				  <thead>
				    <tr>
			          <th>ID</th>
				      <th>Nombre</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($tipos_estados as $tipo_estado)
					    <tr>
					      <td>{{ $tipo_estado->idTipoEstado }}</td>
					      <td>{{ $tipo_estado->nombreTipoEstado }}</td>
					      <td>
					      	<div class="dropdown">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu">
					      			<a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $tipo_estado->idTipoEstado }}">Editar</a>
	                    			@include('admin.mantenedores.tipo_estado.destroy')
                                </div>
                            </div>
					      </td>
                            @include('admin.mantenedores.tipo_estado.edit')
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
