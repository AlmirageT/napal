@extends('layouts.admin.app')
@section('title')
Faqs
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Faqs</h3> 
	</div>
	@include('admin.faqs.create')
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="">
			<div class="table-responsive">
				<table class="table project-list-table table-nowrap table-centered table-borderless">
				  <thead>
				    <tr>
			          <th scope="col" style="width: 100px">ID</th>
				      <th scope="col">Titulo</th>
				      <th scope="col">Sub-Titulo</th>
				      <th scope="col">URL</th>
				      <th scope="col">Tipo</th>
				      <th scope="col">Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($faqs as $faq)
					    <tr>
					      <td>{{ $faq->idFaq }}</td>
					      <td>{{ $faq->tituloFaq }}</td>
					      <td>{{ substr($faq->subTituloFaq,0,20) }}....</td>
					      <td>
					      	@if($faq->url != null)
					      		{{ $faq->url }}
					      	@else
					      		No posee link de redirección
					      	@endif
					      </td>
					      <td>{{ $faq->nombreTipoFaq }}</td>
					      <td>
					      	<div class="dropdown">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu">
					      			<a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $faq->idFaq }}">Editar</a>
	                    			@include('admin.faqs.destroy')
                                </div>
                            </div>
					      </td>
                            @include('admin.faqs.edit')
					    </tr>
					@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
