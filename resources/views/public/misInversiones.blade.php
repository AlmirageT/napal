@extends('layouts.public.app')
@section('title')
Mis Inveriones
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12" align="center">
			<h3>MIS INVERSIONES</h3>
			<br>
			<br>
		</div>
		<div class="col-lg-12">
			<div class="card" style="box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-12"><h4>Resumen de mis inversiones</h4></div>
								<div class="col-lg-12" align="center">
									<br>
									<br>
									<img src="https://static.housers.com/assets/images/icons/dashboard/icon-valor-total-am.svg" class="" style="margin-right: 245px;">
									<div style="margin-right: 65px; margin-top: -65px;">
										<p>CAPITAL TOTAL</p>
									</div>	
									<div style="margin-right: 70px; margin-top: -10px;">
										<h4>0,00 €</h4>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-6">
									<p>Capital invertido</p>
								</div>
								<div class="col-lg-6" align="right">
									<p>0,00 €</p>
								</div>
								<div class="col-lg-6">
									<p>Capital invertido (últimos 12 meses)</p>
								</div>
								<div class="col-lg-6" align="right">
									<p>0,00 €</p>
								</div>
								<div class="col-lg-6">
									<p>Capital vivo (últimos 12 meses)</p>
								</div>
								<div class="col-lg-6" align="right">
									<p>0,00 €</p>
								</div>
								<div class="col-lg-6">
									<p>Capital comprometido</p>
								</div>
								<div class="col-lg-6" align="right">
									<p>0,00 €</p>
								</div>
								<div class="col-lg-6">
									<p>Capital disponible</p>
								</div>
								<div class="col-lg-6" align="right">
									<p>0,00 €</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
		</div>
		<style type="text/css">
			.formulario-busqueda{
		    		width: 200px; margin-right: 10px; margin-left: 10px;
		    	}
		    	.formulario-busqueda1{
					width: 200px; margin-right: 10px; margin-left: 10px;
		    	}
		    	.formulario-busqueda2{
					width: 200px; margin-right: 10px; margin-left: 10px;
		    	}
		    	.formulario-busqueda3{
					width: 200px; margin-right: 10px; margin-left: 10px;
		    	}
		    	.formulario-busqueda4{
					width: 130px; margin-right: 10px; margin-left: 10px;
		    	}
		    	.formulario-busqueda5{
		    		width: 0px; margin-right: 10px; margin-left: 10px;
		    	}
			@media only screen and (max-width: 1199px) {
		    	.formulario-busqueda{
		    		width: 100%;
					margin-right: 30px;
					margin-left: 30px;
		    	}
		    	.formulario-busqueda1{
					width: 100%;
					margin-right: 30px;
					margin-left: 30px;
		    	}
		    	.formulario-busqueda2{
					width: 100%;
					margin-right: 30px;
					margin-left: 30px;
		    	}
		    	.formulario-busqueda3{
					width: 100%;
					margin-right: 30px;
					margin-left: 30px;
		    	}
		    	.formulario-busqueda4{
					width: 100%;
					margin-right: 30px;
					margin-left: 30px;
		    	}
		    	.formulario-busqueda5{
		    		width: 100%;
					margin-right: 30px;
					margin-left: 30px;
		    	}
		    }
		</style>
		<form>
			<div class="row">
				<div class="formulario-busqueda">
					<input type="text" class="form-control" placeholder="¿Que estas buscando?">
				</div>
				<div class="formulario-busqueda1">
					<select class="form-control">
						<option>Pais</option>
					</select>
				</div>
				<div class="formulario-busqueda2">
					<select class="form-control">
						<option>Tipo Inversión</option>
					</select>
				</div>
				<div class="formulario-busqueda3">
					<select class="form-control">
						<option>Estado</option>
					</select>
				</div>
				<div class="formulario-busqueda4" >
					<input type="checkbox" name="">
					<p style="margin-left: 25px; margin-top: -26px;">Vendido CCD</p>
				</div>
				<div class="formulario-busqueda5">
					<input class="btn btn-primary" type="submit" value="Buscar" />
				</div>
			</div>
		</form>
	</div>
	<br>
	<br>
	@if(count($propiedades)>0)
		<div class="row">
			@foreach($propiedades as $propiedad)
			@php
				$nombrePropiedad = str_replace(" ", "-", $propiedad->nombrePropiedad);
			@endphp
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-12"><h6>{{ $propiedad->nombrePropiedad }}</h6></div>
								<div class="col-lg-6" align="left">
									@if($propiedad->idTipoFlexibilidad == 1)
										<p>Tipo flexible</p>
									@else
										<p>Tipo fijo</p>
									@endif
								</div>
								<div class="col-lg-6" align="right">
									<p>{{ $propiedad->nombreEstado }}</p>
								</div>
								<div class="col-lg-12">
									<div class="chart-container">
										<div id="chart_555" class="charts-oportunidades" data-value-invested="80" data-value-income="0" data-value-profitability="0" data-value-profitability-estimated="10" data-value-benefits="0" data-value-financial="FIXEDINTEREST" data-value-project-invested="0" data-value-target="0" data-highcharts-chart="0"><div id="highcharts-z2vuds0-0" style="position: relative; overflow: hidden; width: 330px; height: 250px; text-align: left; line-height: normal; z-index: 0; font-family: &quot;Rubik&quot;, sans-serif; font-weight: normal; color: rgb(10, 10, 10); left: 0.5px; top: 0.416687px;" class="highcharts-container "><svg version="1.1" class="highcharts-root" style="font-family:&quot;Rubik&quot;,sans-serif;font-size:12px;font-weight:normal;color:#0a0a0a;fill:#0a0a0a;" xmlns="http://www.w3.org/2000/svg" width="330" height="250" viewBox="0 0 330 250"><desc>Created with Highcharts 5.0.14</desc><defs><clipPath id="highcharts-z2vuds0-1"><rect x="0" y="0" width="310" height="225" fill="none"></rect></clipPath></defs><rect fill="rgba(255, 255, 255, 0.0)" class="highcharts-background" x="0" y="0" width="330" height="250" rx="0" ry="0"></rect><rect fill="none" class="highcharts-plot-background" x="10" y="10" width="310" height="225"></rect><g class="highcharts-pane-group"></g><rect fill="none" class="highcharts-plot-border" x="10" y="10" width="310" height="225"></rect><g class="highcharts-series-group"><g class="highcharts-series highcharts-series-0 highcharts-pie-series highcharts-color-undefined highcharts-tracker " transform="translate(10,10) scale(1 1)"><path fill="#98CAC6" d="M 154.96732564851 28.50000635484099 A 84 84 0 0 1 154.88332568520198 28.50008102918035 L 154.88332568520198 28.50008102918035 A 84 84 0 0 0 154.96732564851 28.50000635484099 Z" class="highcharts-halo highcharts-color-1" fill-opacity="0.25"></path><path fill="#4F4345" d="M 154.9828914508896 29.000001742276524 A 84 84 0 1 1 154.88332568520198 29.00008102918035 M 154.89499311668177 37.400072926262325 A 75.6 75.6 0 1 0 154.98460230580065 37.40000156804888 " transform="translate(0,0)" stroke-linejoin="round" class="highcharts-point highcharts-color-0 "></path><path fill="#98CAC6" d="M 154.96732564851 29.00000635484099 A 84 84 0 0 1 154.88332568520198 29.00008102918035 L 154.89499311668177 37.400072926262325 A 75.6 75.6 0 0 0 154.970593083659 37.4000057193569 Z" transform="translate(0,0)" stroke-linejoin="round" class="highcharts-point highcharts-color-1 "></path></g><g class="highcharts-markers highcharts-series-0 highcharts-pie-series highcharts-color-undefined " transform="translate(10,10) scale(1 1)"></g></g><g class="highcharts-data-labels highcharts-series-0 highcharts-pie-series highcharts-color-undefined highcharts-tracker " visibility="visible" transform="translate(10,10) scale(1 1)"><g class="highcharts-label highcharts-data-label highcharts-data-label-color-0 highcharts-tracker" transform="translate(165,215)"></g><g class="highcharts-label highcharts-data-label highcharts-data-label-color-1 highcharts-tracker" transform="translate(67,-10)"></g></g></svg><div class="highcharts-data-labels highcharts-series-0 highcharts-pie-series highcharts-color-undefined " style="position: absolute; left: 10px; top: 10px; opacity: 1;"><div class="highcharts-label highcharts-data-label highcharts-data-label-color-0 highcharts-tracker" style="position: absolute; left: 165px; top: 215px; opacity: 1; visibility: inherit;"><span style="font-family: &quot;Rubik&quot;, sans-serif; font-size: 11px; position: absolute; white-space: nowrap; font-weight: 100; color: rgb(10, 10, 10); margin-left: 0px; margin-top: 0px; left: 5px; top: 5px;">Inversión<br> 80.00 €</span></div><div class="highcharts-data-labels highcharts-series-0 highcharts-pie-series highcharts-color-undefined highcharts-tracker " style="position: absolute; left: 67px; top: -10px; opacity: 1; visibility: inherit;"><span style="font-family: &quot;Rubik&quot;, sans-serif; font-size: 11px; position: absolute; white-space: nowrap; font-weight: 100; color: rgb(10, 10, 10); margin-left: 0px; margin-top: 0px; left: 5px; top: 5px;">Rendimientos<br> 0.00 €</span></div></div></div></div>
									</div>
								</div>
								<div class="col-lg-12" align="center">
									<br>
									<a class="btn btn-primary" href="{{ asset('dashboard/mi-inversion/detalle') }}?nombrePropiedad={{ $nombrePropiedad }}&idPropiedad={{ Crypt::encrypt($propiedad->idPropiedad) }}"><small style="color: white">VER DETALLE</small></a>
								</div>
							</div>
						</div>
					</div>
					<br>
				</div>
			@endforeach
		</div>
	@endif
	<br>
	<br>
</div>
@endsection