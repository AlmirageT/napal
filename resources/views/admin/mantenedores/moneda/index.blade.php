@extends('layouts.admin.app')
@section('title')
Monedas
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Monedas</h3> 
	</div>
	@include('admin.mantenedores.moneda.create')
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
				      <th>ITAC</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($monedas as $moneda)
					    <tr>
					      <td>{{ $moneda->idMoneda }}</td>
					      <td>{{ $moneda->nombreMoneda }}</td>
					      <td>{{ $moneda->itac }}</td>
					      <td>
					      	<div class="dropdown">
		                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
		                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
		                        </a>
		                        <div class="dropdown-menu dropdown-menu">
					      			<a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $moneda->idMoneda }}">Editar</a>
		                			@include('admin.mantenedores.moneda.destroy')
		                        </div>
		                    </div>
					      </td>
		                    @include('admin.mantenedores.moneda.edit')
					    </tr>
					@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
