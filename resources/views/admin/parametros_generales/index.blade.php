@extends('layouts.admin.app')
@section('title')
Parametros Generales
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Parametros Generales</h3> 
	</div>
	@include('admin.parametros_generales.create')
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="">
			<div class="table-responsive">
				<table class="table project-list-table table-nowrap table-centered table-borderless">
				  <thead>
				    <tr>
			          <th>ID</th>
				      <th>Nombre Parametro</th>
				      <th>Valor Parametro</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($parametrosGenerales as $parametroGeneral)
					    <tr>
					      <td>{{ $parametroGeneral->idParametroGeneral }}</td>
					      <td>{{ $parametroGeneral->nombreParametroGeneral }}</td>
					      <td>{{ $parametroGeneral->valorParametroGeneral }}</td>
					      <td>
					      	<div class="dropdown">
		                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
		                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
		                        </a>
		                        <div class="dropdown-menu dropdown-menu">
		                            <a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $parametroGeneral->idParametroGeneral }}">Editar</a>
		                            @include('admin.parametros_generales.destroy')
		                        </div>
		                    </div>
					      		
					      </td>
		                    @include('admin.parametros_generales.edit')
					    </tr>
					@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection