@extends('layouts.admin.app')
@section('title')
Tipos Personas
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Tipos Personas</h3> 
	</div>
	@include('admin.mantenedores.tipo_persona.create')
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
				  	@foreach($tiposPersonas as $tipoPersona)
					    <tr>
					      <td>{{ $tipoPersona->idTipoPersona }}</td>
					      <td>{{ $tipoPersona->nombreTipoPersona }}</td>
					      <td>
					      	<div class="dropdown">
		                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
		                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
		                        </a>
		                        <div class="dropdown-menu dropdown-menu">
					      			<a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $tipoPersona->idTipoPersona }}">Editar</a>
		                			@include('admin.mantenedores.tipo_persona.destroy')

		                        </div>
		                    </div>
					      </td>
		                    @include('admin.mantenedores.tipo_persona.edit')
					    </tr>
					@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
