@extends('layouts.admin.app')
@section('title')
Imagenes Planos Propiedades
@endsection
@section('css')
<link href="{{ asset('assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<div align="center">
				<h3>Subir Imagenes</h3>
			</div>
		</div>
		<div class="card-body">
			<form action="{{ asset('napalm/img-planos') }}/{{ $idPropiedad }}" class="dropzone" method="post">
				@csrf
	            <div class="fallback">
	                <input name="file" type="file" multiple="multiple">
	            </div>
	            <div class="dz-message needsclick">
	                <div class="mb-3">
	                    <i class="display-4 text-muted bx bxs-cloud-upload"></i>
	                </div>
	                <h4>Ingrese imagenes a subir</h4>
	            </div>
	        </form>
		</div>
		<div class="card-footer">

		</div>
	</div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js') }}"></script>
@endsection

