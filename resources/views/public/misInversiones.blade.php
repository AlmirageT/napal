@extends('layouts.public.app')
@section('title','Mis Inversiones')
@section('css')
<style type="text/css">
	.porcentaje{
		position: absolute;
		margin-top: 8rem;
		margin-left: -15rem;
		font-size: 1.5rem;
	}
	.porcentaje2{
		position: absolute;
		margin-top: 8rem;
		margin-left: -14rem;
		font-size: 1.5rem;
	}
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
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-4"></div>
		<div class="col-lg-4" align="center">
			<h3>MIS INVERSIONES</h3>
			<br>
			<br>
		</div>
		<div class="col-lg-4" align="right">
			<a href="{{ asset('dashboard/oportunidades') }}" class="btn btn-danger">Invierte</a>
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
										<h4>
											@if(count($saldoDisponible)>0)
												${{ number_format($saldoDisponible->first()->cantidadSaldoDisponible,0,',','.') }}
											@else
												$0
											@endif
										</h4>
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
									<p>${{ number_format($total,0,',','.') }}</p>
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
									<p>${{ number_format($totalProyectoEnFinanciacion,0,',','.') }}</p>
								</div>
								<div class="col-lg-6">
									<p>Capital disponible</p>
								</div>
								<div class="col-lg-6" align="right">
									<p>
										@if(count($saldoDisponible)>0)
											${{ number_format($saldoDisponible->first()->cantidadSaldoDisponible,0,',','.') }}
										@else
											$0
										@endif
									</p>
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
		{{--  
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
					<input type="checkbox" name="" id="vendido">
					<label for="vendido" style="margin-left: 13px; margin-top: 0px;position: absolute;">Vendido CCD</label>
				</div>
				<div class="formulario-busqueda5">
					<input class="btn btn-primary" type="submit" value="Buscar" />
				</div>
			</div>
		</form>--}}
	</div>
	<br>
	<br>
	@if(count($propiedades)>0)
		<div class="row">
			@foreach($propiedades as $propiedad)
			@php
				$nombrePropiedad = str_replace(" ", "-", $propiedad->nombrePropiedad);
				$inversiones = $ingresos->where('idUsuario',Session::get('idUsuario'))->where('idPropiedad',$propiedad->idPropiedad);
				$totalInversion = 0;
				foreach($inversiones as $inversion){
					$totalInversion = $totalInversion + $inversion->monto;
				}
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
									<div id="donutchart{{ $propiedad->idPropiedad }}" style="width: 318px; height: 285px;"></div>
									<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

									<script type="text/javascript">
									  google.charts.load("current", {packages:["corechart"]});
									  google.charts.setOnLoadCallback(drawChart);
									  function drawChart() {
									    var data = google.visualization.arrayToDataTable([
									      ['Task', 'Hours per Day'],
									      ['Rendimientos',     100500],
									      ['Inversión',      {{ $totalInversion }}]
									    ]);

									    var options = {
									      pieHole: 0.9,
									    };

									    var chart = new google.visualization.PieChart(document.getElementById('donutchart{{ $propiedad->idPropiedad }}'));
									    chart.draw(data, options);
									  }
									</script>
								</div>
								<div >
									@if (strlen($propiedad->rentabilidadAnual)>2)
										<p class="porcentaje">{{ $propiedad->rentabilidadAnual }}%</p>
									@else
										<p class="porcentaje2">{{ $propiedad->rentabilidadAnual }}%</p>
									@endif
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
@section('scripts')


@endsection