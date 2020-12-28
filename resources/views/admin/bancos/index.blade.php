@extends('layouts.admin.app')
@section('title','Banco')
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Bancos Asociados</h3> 
	</div>
	@include('admin.bancos.create')
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="">
			<div class="table-responsive">
				<table class="table project-list-table table-nowrap table-centered table-borderless">
				  <thead>
				    <tr>
			          <th>ID</th>
				      <th>Nombre Banco</th>
				      <th>Pais</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach ($bancos as $banco)
						    <tr>
						      <td>{{ $banco->idBanco }}</td>
						      <td>{{ $banco->nombreBanco }}</td>
						      <td>{{ $banco->nombrePais }}</td>
						      <td>
						      	<div class="dropdown">
			                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
			                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
			                        </a>
			                        <div class="dropdown-menu dropdown-menu">
						      			<a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $banco->idBanco }}">Editar</a>
		                    			@include('admin.bancos.destroy')
			                        </div>
			                    </div>
						      </td>
	                            @include('admin.bancos.edit')
						    </tr>
				  	@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection