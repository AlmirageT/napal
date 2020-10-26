@extends('layouts.admin.app')
@section('title')
Estados
@endsection
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-12" align="center">
					<h3>Estados</h3> 
				</div>
			</div>
			@include('admin.parametros_generales.create')
		</div>
		<div class="card-body">
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
				  	@foreach($parametros_generales as $parametro_general)
					    <tr>
					      <td>{{ $parametro_general->idParametroGeneral }}</td>
					      <td>{{ $parametro_general->nombreParametroGeneral }}</td>
					      <td>{{ $parametro_general->valorParametroGeneral }}</td>
					      <td>
					      	<div class="dropdown">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu">
                                    <a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $parametro_general->idParametroGeneral }}">Editar</a>
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
		<div class="card-footer">
			
		</div>
	</div>
</div>
@endsection