@extends('layouts.admin.app')
@section('title','Blog')
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Blogs</h3> 
	</div>
	@include('admin.blog.create')
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
				  		@foreach ($blogs as $blog)
						    <tr>
						      <td>{{ $blog->idBlog }}</td>
						      <td>{{ $blog->nombreBlog }}</td>
						      <td>{{ substr($blog->textoBlog, 0, 30) }}</td>
						      <td>
						      	<div class="dropdown">
			                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
			                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
			                        </a>
			                        <div class="dropdown-menu dropdown-menu">
						      			<a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $blog->idBlog }}">Editar</a>
		                    			@include('admin.blog.destroy')
			                        </div>
			                    </div>
						      </td>
	                            @include('admin.blog.edit')
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
    <script>
        $('.summernote').summernote({
            height: 200,
            
        });
    </script>
@endsection