@extends('layouts.public.app')
@section('title')
Ingresos
@endsection
@section('css')
<style type="text/css">
	.espacio{
		width: {{100/$tiposMediosPagos->count()}}%;
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
		            <a class="nav-item nav-link active espacio" id="nav-descripcion-tab" data-toggle="tab" href="#nav-descripcion" role="tab" aria-controls="nav-descripcion" aria-selected="true"><small>{{ $tiposMediosPagos->shift()->nombreTipoMedioPago }}</small></a>
		            @for ($i = 0; $i < $tiposMediosPagos->count(); $i++)
			            <a class="nav-item nav-link espacio" id="nav-info-tab" data-toggle="tab" href="#nav{{ $i }}" role="tab" aria-controls="nav-info" aria-selected="false"><small>{{ $tiposMediosPagos[$i]->nombreTipoMedioPago }}</small></a>
		            @endfor
		        </div>
		    </nav>
		    <div class="tab-content" id="nav-tabContent">
		        <div class="tab-pane fade show active" id="nav-descripcion" role="tabpanel" aria-labelledby="nav-descripcion-tab">
		        	@include('public.navtab.transferencia')
		        </div>
		        @for ($i = 0; $i < $tiposMediosPagos->count(); $i++)
			        <div class="tab-pane fade" id="nav{{ $i }}" role="tabpanel" aria-labelledby="nav-info-tab">
			        	@switch($i)
			        	    @case(0)
		        				@include('public.navtab.paypal')
			        	        @break
			        	 	@case(1)
			        			@include('public.navtab.tarjeta')
			        	        @break
			        	    @default
			        	            Default case...
			        	@endswitch
			        	
			        </div>
		        @endfor
		    </div>
	    </div>
	</div>
</div>
@endsection