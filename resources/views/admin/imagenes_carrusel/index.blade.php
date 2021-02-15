@extends('layouts.admin.app')
@section('title')
Imagenes Carrusel
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Imagenes Carrusel</h3> 
	</div>
	@include('admin.imagenes_carrusel.create')
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="">
			<div class="table-responsive">
				<table class="table project-list-table table-nowrap table-centered table-borderless">
				  <thead>
				    <tr>
			          <th>ID</th>
				      <th>Imagen</th>
				      <th>Titulo</th>
				      <th>SubTitulo</th>
				      <th>Activo</th>
				      <th>Tipo Imagen</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($imagenesCarruseles as $imagenCarrusel)
					    <tr>
					      <td>{{ $imagenCarrusel->idImagenCarrusel }}</td>
					      <td>
				      		@if($imagenCarrusel->rutaImagenCarrusel != null)
					      		<img src="{{ asset($imagenCarrusel->rutaImagenCarrusel) }}" width="100" height="100">
					      	@else
					      		No tiene imagen
					      	@endif
					      </td>
					      <td>{{ $imagenCarrusel->tituloImagenCarrusel }}</td>
					      <td>{{ $imagenCarrusel->subTituloImagenCarrusel }}</td>
					      <td>
					      	@if($imagenCarrusel->activoImagenCarrusel == 1)
					      		Si
					      	@else
					      		No
					      	@endif
					      </td>
					      <td>{{ $imagenCarrusel->nombreTipoImagen }}</td>
					      <td>
					      	<div class="dropdown">
		                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
		                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
		                        </a>
		                        <div class="dropdown-menu dropdown-menu">
		                            <a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $imagenCarrusel->idImagenCarrusel }}">Editar</a>
		                            @include('admin.imagenes_carrusel.destroy')
		                        </div>
		                    </div>
					      		
					      </td>
		                    @include('admin.imagenes_carrusel.edit')
					    </tr>
					@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection