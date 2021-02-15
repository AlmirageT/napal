@extends('layouts.admin.app')
@section('title')
Tipos Faqs
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Tipos Faqs</h3> 
	</div>
	@include('admin.mantenedores.tipoFaq.create')
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="">
			<div class="table-responsive">
				<table class="table project-list-table table-nowrap table-centered table-borderless">
				  <thead>
				    <tr>
			          <th scope="col" style="width: 100px">ID</th>
				      <th scope="col">Nombre</th>
				      <th scope="col">Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($tiposFaqs as $tipoFaq)
					    <tr>
					      <td>{{ $tipoFaq->idTipoFaq }}</td>
					      <td>{{ $tipoFaq->nombreTipoFaq }}</td>
					      <td>
					      	<div class="dropdown">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu">
					      			<a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $tipoFaq->idTipoFaq }}">Editar</a>
	                    			@include('admin.mantenedores.tipoFaq.destroy')
                                </div>
                            </div>
					      </td>
                            @include('admin.mantenedores.tipoFaq.edit')
					    </tr>
					@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
