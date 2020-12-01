@extends('layouts.public.app')
@section('title')
Ingresos
@endsection
@section('css')
<style type="text/css">
	.espacio{
		width: 50%;
	}
</style>
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12" align="center">
			<h3>INGRESAR FONDOS</h3>
			<br>
		</div>
		<div class="col-lg-12" align="left">
		    <nav>
		        <div class="nav nav-tabs" id="nav-tab" role="tablist">
		            <a class="nav-item nav-link active espacio" id="nav-descripcion-tab" data-toggle="tab" href="#nav-descripcion" role="tab" aria-controls="nav-descripcion" aria-selected="true"><small>TRANSFERENCIA BANCARIA</small></a>
		            <a class="nav-item nav-link espacio" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-info" aria-selected="false"><small>TARJETA BANCARIA</small></a>
		        </div>
		    </nav>
		    <div class="tab-content" id="nav-tabContent">
		        <div class="tab-pane fade show active" id="nav-descripcion" role="tabpanel" aria-labelledby="nav-descripcion-tab">
		        	@include('public.navtab.transferencia')
		        </div>
		        <div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
		        	@include('public.navtab.tarjeta')
		        </div>
		    </div>
	    </div>
	</div>
</div>
@endsection