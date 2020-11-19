@extends('layouts.admin.app')
@section('title')
Crear Documento
@endsection
@section('content')
<div class="container">
    {!!Form::open(['route' => 'mantenedor-documentos.store', 'method' => 'POST','files'=>true])!!}
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-12" align="center">
					<h3>Crear Documento</h3> 
				</div>
			</div>
			<a href="{{ asset('napalm/propiedades') }}" class="btn btn-light">Volver</a>
		</div>
		<div class="card-body">
			<div class="container">
				<div class="row">
					<input type="hidden" name="idPropiedad" value="{{ $idPropiedad }}">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Nombre Documento</label>
							{!!Form::text('nombreDocumento',null,['class'=>"form-control", 'placeholder'=>"Ingrese sus nombres" , 'required'])!!}
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label>Ingrese documento</label>
							<input type="file" name="documentoArchivo" required class="form-control">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label>Tipo Documento</label>
							{!!Form::select('idTipoDocumento',$tipos_documentos,null,['class'=>"form-control js-example-basic-multiple", 'placeholder'=>"Ingrese el tipo de documento" , 'required'])!!}
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
						 	<label>Notas</label>
						 	<textarea class="form-control" name="notas"></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer">
			{!! Form::submit('Agregar Documento',['class'=>"btn btn-primary btn-block"]) !!}
		</div>
	</div>
    {!!Form::close()!!}
</div>
<div class="container">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-12" align="center">
					<h3>Documentos</h3> 
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table project-list-table table-nowrap table-centered table-borderless">
				  <thead>
				    <tr>
			          <th>ID</th>
				      <th>Nombre</th>
				      <th>Tipo Documento</th>
				      <th>Propiedad</th>
				      <th>Fecha de Subida</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($documentos as $documento)
				  	@php
				  		$newDate = date("d/m/Y", strtotime($documento->created_at));
				  	@endphp
					    <tr>
				    	  <td>{{ $documento->idDocumento }}</td>
					      <td><a href="{{ asset('napalm/documentos/ver-documento') }}/{{ $documento->idDocumento }}">{{ $documento->nombreDocumento }}</a></td>
					      <td>{{ $documento->nombreTipoDocumento }}</td>
					      <td>{{ $documento->nombrePropiedad }}</td>
					      <td>{{ $newDate }}</td>
					      <td>
					      	<div class="dropdown">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu">
                                    @include('admin.documentos.destroy')
                                </div>
                            </div>
					      </td>
					    </tr>
					@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script>
	$(document).ready(function(){
    	$('.js-example-basic-multiple').select2({});
    });
</script>
@endsection