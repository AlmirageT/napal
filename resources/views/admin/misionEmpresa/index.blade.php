@extends('layouts.admin.app')
@section('title')
Mision Empresa
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Misión Empresa</h3> 
	</div>
	@include('admin.misionEmpresa.create')
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
				      <th>Texto</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($misionesEmpresas as $misionEmpresa)
					    <tr>
					      <td>{{ $misionEmpresa->idMisionEmpresa }}</td>
					      <td>{{ $misionEmpresa->nombreMisionEmpresa }}</td>
					      <td>{{ substr($misionEmpresa->textoMisionEmpresa, 0, 30) }}</td>
					      <td>
					      	<div class="dropdown">
		                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
		                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
		                        </a>
		                        <div class="dropdown-menu dropdown-menu">
		                            <a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $misionEmpresa->idMisionEmpresa }}">Editar</a>
		                            @include('admin.misionEmpresa.destroy')
		                        </div>
		                    </div>
					      		
					      </td>
		                    @include('admin.misionEmpresa.edit')
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
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('.summernote').summernote({
        height: 200
    });

</script>
@endsection