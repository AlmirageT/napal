@extends('layouts.admin.app')
@section('title','Tipo Cuentas')
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Tipo de Cuentas Bancarias</h3> 
	</div>
	@include('admin.tipoCuenta.create')
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="">
			<div class="table-responsive">
				<table class="table project-list-table table-nowrap table-centered table-borderless">
				  <thead>
				    <tr>
			          <th>ID</th>
				      <th>Nombre Tipo Cuenta</th>
				      <th>Nombre Banco</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  		@foreach ($tiposCuentas as $tipoCuenta)
						    <tr>
						      <td>{{ $tipoCuenta->idTipoCuenta }}</td>
						      <td>{{ $tipoCuenta->nombreTipoCuenta }}</td>
						      <td>{{ $tipoCuenta->nombreBanco }}</td>
						      <td>
						      	<div class="dropdown">
			                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
			                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
			                        </a>
			                        <div class="dropdown-menu dropdown-menu">
						      			<a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $tipoCuenta->idTipoCuenta }}">Editar</a>
		                    			@include('admin.tipoCuenta.destroy')
			                        </div>
			                    </div>
						      </td>
	                            @include('admin.tipoCuenta.edit')
						    </tr>
				  		@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection