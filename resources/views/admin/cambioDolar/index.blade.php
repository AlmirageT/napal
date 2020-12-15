@extends('layouts.admin.app')
@section('title')
Cambio Dolar
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Cambio Dolar</h3> 
	</div>
	@include('admin.cambioDolar.create')
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="">
			<div class="table-responsive">
				<table class="table project-list-table table-nowrap table-centered table-borderless">
				  <thead>
				    <tr>
			          <th>ID</th>
				      <th>Valor</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($cambiosDolares as $cambioDolar)
					    <tr>
					      <td>{{ $cambioDolar->idCambioDolar }}</td>
					      <td>{{ $cambioDolar->valorCambioDolar }}</td>
					      <td>
					      	<div class="dropdown">
		                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
		                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
		                        </a>
		                        <div class="dropdown-menu dropdown-menu">
					      			<a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $cambioDolar->idCambioDolar }}">Editar</a>
	                    			@include('admin.cambioDolar.destroy')
		                        </div>
		                    </div>
					      </td>
                            @include('admin.cambioDolar.edit')
					    </tr>
					@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection