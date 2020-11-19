@extends('layouts.admin.app')
@section('title')
Códigos Promocionales
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Códigos Promocionales</h3> 
	</div>
	@include('admin.codigosPromocionales.create')
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="">
			<div class="table-responsive">
				<table class="table project-list-table table-nowrap table-centered table-borderless">
				  <thead>
				    <tr>
			          <th>ID</th>
				      <th>Código</th>
				      <th>Fecha Vencimiento</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($codigos as $codigo)
					    <tr>
					      <td>{{ $codigo->idCodigo }}</td>
					      <td>{{ $codigo->codigo }}</td>
					      <td>{{ $codigo->fechaVencimiento }}</td>
					      <td>
					      	<div class="dropdown">
		                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
		                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
		                        </a>
		                        <div class="dropdown-menu dropdown-menu">
					      			<a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $codigo->idCodigo }}">Editar</a>
	                    			@include('admin.codigosPromocionales.destroy')
		                        </div>
		                    </div>
					      </td>
                            @include('admin.codigosPromocionales.edit')
					    </tr>
					@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection