@extends('layouts.admin.app')
@section('title')
Tipos Télefonos
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Tipos Télefonos</h3> 
	</div>
	@include('admin.mantenedores.tipo_telefono.create')
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
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($tipos_telefonos as $tipo_telefono)
					    <tr>
					      <td>{{ $tipo_telefono->idTipoTelefono }}</td>
					      <td>{{ $tipo_telefono->nombreTipoTelefono }}</td>
					      <td>
					      	<div class="dropdown">
		                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
		                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
		                        </a>
		                        <div class="dropdown-menu dropdown-menu">
					      			<a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $tipo_telefono->idTipoTelefono }}">Editar</a>

		                			@include('admin.mantenedores.tipo_telefono.destroy')
		                        </div>
		                    </div>
					      </td>
		                    @include('admin.mantenedores.tipo_telefono.edit')
					    </tr>
					@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
