@extends('layouts.admin.app')
@section('title','Tipografias')
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Tipografias</h3> 
	</div>
	@include('admin.tipografia.create')
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="">
			<div class="table-responsive">
				<table class="table project-list-table table-nowrap table-centered table-borderless">
				  <thead>
				    <tr>
                      <th>ID</th>
                      <th>Nombre General</th>
				      <th>Link Tipografia</th>
				      <th>Nombre Tipografia</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  		@foreach ($tipografias as $tipografia)
						    <tr>
						      <td>{{ $tipografia->idTipografia }}</td>
						      <td>{{ $tipografia->nombreGeneral }}</td>
						      <td>{{ $tipografia->linkTipografia }}</td>
						      <td>{{ $tipografia->nombreTipografia }}</td>
						      <td>
						      	<div class="dropdown">
			                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
			                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
			                        </a>
			                        <div class="dropdown-menu dropdown-menu">
						      			<a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $tipografia->idTipografia }}">Editar</a>
		                    			@include('admin.tipografia.destroy')
			                        </div>
			                    </div>
						      </td>
	                            @include('admin.tipografia.edit')
						    </tr>
				  		@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection