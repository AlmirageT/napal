@extends('layouts.admin.app')
@section('title')
Tipos Flexibilidades
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Tipos Flexibilidades</h3> 
	</div>
	@include('admin.mantenedores.tipo_flexibilidad.create')
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
				  	@foreach($tipos_flexibilidades as $tipo_flexibilidad)
					    <tr>
					      <td>{{ $tipo_flexibilidad->idTipoFlexibilidad }}</td>
					      <td>{{ $tipo_flexibilidad->nombreTipoFlexibilidad }}</td>
					      <td>
					      	<div class="dropdown">
	                            <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
	                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
	                            </a>
	                            <div class="dropdown-menu dropdown-menu">
					      			<a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $tipo_flexibilidad->idTipoFlexibilidad }}">Editar</a>
	                    			@include('admin.mantenedores.tipo_flexibilidad.destroy')
	                            </div>
	                        </div>
					      </td>
	                        @include('admin.mantenedores.tipo_flexibilidad.edit')
					    </tr>
					@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
