@extends('layouts.admin.app')
@section('title')
Crear Télefono
@endsection
@section('content')
<div class="container">
    {!!Form::open(['route' => 'mantenedor-telefonos.store', 'method' => 'POST','files'=>true])!!}
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-12" align="center">
					<h3>Crear Télefono</h3> 
				</div>
			</div>
			<a href="{{ asset('napalm/usuarios') }}" class="btn btn-light">Volver</a>
		</div>
		<div class="card-body">
			<div class="container">
				<div class="row">
					<input type="hidden" name="idUsuario" value="{{ $idUsuario }}">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Número</label>
							{!!Form::number('numero',null,['class'=>"form-control", 'placeholder'=>"9 87654321" , 'required'])!!}
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Tipo Télefono</label>
							{!!Form::select('idTipoTelefono',$tipos_telefonos,null,['class'=>"form-control", 'placeholder'=>"Ingrese el tipo de documento" , 'required'])!!}
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer">
			{!! Form::submit('Agregar Télefono',['class'=>"btn btn-primary btn-block"]) !!}
		</div>
	</div>
    {!!Form::close()!!}
</div>
<div class="container">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-12" align="center">
					<h3>Telefonos</h3> 
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table project-list-table table-nowrap table-centered table-borderless">
				  <thead>
				    <tr>
			          <th>ID</th>
				      <th>Número</th>
				      <th>Tipo Télefono</th>
				      <th>Usuario</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($telefonos as $telefono)
					    <tr>
				    	  <td>{{ $telefono->idTelefono }}</td>
					      <td>{{ $telefono->numero }}</td>
					      <td>{{ $telefono->nombreTipoTelefono }}</td>
					      <td>{{ $telefono->nombre }} {{ $telefono->apellido }}</td>
					      <td>
					      	<div class="dropdown">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu">
					      			<a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $telefono->idTelefono }}">Editar</a>
                                    @include('admin.telefonos.destroy')
                                </div>
                            </div>
					      </td>
                            @include('admin.telefonos.edit')

					    </tr>
					@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection