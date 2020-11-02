@extends('layouts.admin.app')
@section('title')
Redes Sociales
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Redes Sociales</h3> 
	</div>
	@include('admin.redesSociales.create')
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
				      <th>Ruta</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($redesSociales as $redSocial)
					    <tr>
					      <td>{{ $redSocial->idRedSocial }}</td>
					      <td>{{ $redSocial->nombreRedSocial }}</td>
					      <td>{{ $redSocial->rutaRedSocial }}</td>
					      <td>
					      	<div class="dropdown">
		                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
		                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
		                        </a>
		                        <div class="dropdown-menu dropdown-menu">
					      			<a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $redSocial->idRedSocial }}">Editar</a>
	                    			@include('admin.redesSociales.destroy')
		                        </div>
		                    </div>
					      </td>
                            @include('admin.redesSociales.edit')
					    </tr>
					@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection