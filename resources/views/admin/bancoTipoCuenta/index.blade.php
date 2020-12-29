@extends('layouts.admin.app')
@section('title','Banco Tipo Cuentas')
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Cuentas Bancarias asociadas a Bancos</h3> 
	</div>
	@include('admin.bancoTipoCuenta.create')
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
				  		@foreach ($bancosTiposCuentas as $bancoTipoCuenta)
						    <tr>
						      <td>{{ $bancoTipoCuenta->idBancoTipoCuenta }}</td>
						      <td>{{ $bancoTipoCuenta->nombreTipoCuenta }}</td>
						      <td>{{ $bancoTipoCuenta->nombreBanco }}</td>
						      <td>
						      	<div class="dropdown">
			                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
			                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
			                        </a>
			                        <div class="dropdown-menu dropdown-menu">
						      			<a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $bancoTipoCuenta->idBancoTipoCuenta }}">Editar</a>
		                    			@include('admin.bancoTipoCuenta.destroy')
			                        </div>
			                    </div>
						      </td>
	                            @include('admin.bancoTipoCuenta.edit')
						    </tr>
				  		@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection