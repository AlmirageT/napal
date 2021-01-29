@extends('layouts.public.app')
<style type="text/css">
	.card{
		box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
	}
	
</style>
@section('title')
Dashboard
@endsection
@section('content')
<br>
<div class="container">
	<div class="row">
		<div class="col-lg-7">
			@if(Session::has('nombre'))
				<h3>Bienvenid@ {{ Session::get('nombre') }} {{ Session::get('apellido') }}</h3>
			@else
				<h3>Bienvenid@ Usuari@</h3>
			@endif
		<br>
		<br>
		</div>
		<div class="col-lg-12">
			<div class="card" style="background-color: #13294A">
				<div class="card-body">
					<div class="row" align="center">
						<div class="col-lg-4">
							<div class="form-group">
								<p style="color: #fff;">Capital total invertido</p>
								<h3 style="color: #fff;">${{ number_format($total,0,',','.') }}</h3>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<p style="color: #fff;">Beneficio neto</p>
								<h3 style="color: #fff;">$0</h3>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<p style="color: #fff;">TIR media</p>
								<h3 style="color: #fff;">$0</h3>
							</div>
						</div>

						<div class="col-lg-4">
							<div class="form-group">
								<p style="color: #fff;">Ingresos por promos</p>
								<h3 style="color: #fff;">$0</h3>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<p style="color: #fff;">Saldo disponible</p>
								<h3 style="color: #fff;">
									@if(count($saldoDisponible)>0)
										${{ number_format($saldoDisponible->first()->cantidadSaldoDisponible,0,',','.') }}
									@else
										$0
									@endif
								</h3>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<p style="color: #fff;">Rentabilidad provisional</p>
								<h3 style="color: #fff;">0.00%</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>
		</div>
			<br>

		<div class="col-lg-12">
			<h3>Inversión, beneficios y saldo disponible</h3>
			<br>
		</div>
		<div class="col-lg-6">
			<div class="card" >
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12" align="center">
							<p>Inversión: ${{ number_format($total,0,',','.') }}</p>
						</div>
						<div class="col-lg-8">
							<p>Proyectos financiados</p>
						</div>
						<div class="col-lg-4" align="right">
							<p>${{ number_format($totalProyectoFinanciado,0,',','.') }}</p>
						</div>

						<div class="col-lg-8">
							<p>Inversión últimos 12 meses</p>
						</div>
						<div class="col-lg-4" align="right">
							<p>$0</p>
						</div>

						<div class="col-lg-8">
							<p>Capital vivo últimos 12 meses</p>
						</div>
						<div class="col-lg-4" align="right">
							<p>$0</p>
						</div>

						<div class="col-lg-8">
							<p>Proyectos en financiación</p>
						</div>
						<div class="col-lg-4" align="right">
							<p>${{ number_format($totalProyectoEnFinanciacion,0,',','.') }}</p>
						</div>
						<div class="col-lg-12" align="center">
							<a href="{{ asset('dashboard/mis-inversiones') }}" class="btn btn-primary">Mis inversiones</a>
						</div>
					</div>
				</div>
			</div>
			<br>
		</div>
		{{--  
		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12" align="center">
							<p>Beneficios promos: $0</p>
						</div>
						<div class="col-lg-8">
							<p>Cashback recibidos y promos</p>
						</div>
						<div class="col-lg-4" align="right">
							<p>$0</p>
						</div>

						<div class="col-lg-8">
							<p>Incrementos de rentabilidad</p>
						</div>
						<div class="col-lg-4" align="right">
							<p>$0</p>
						</div>

						<div class="col-lg-8">
							<p>Promo amigo</p>
						</div>
						<div class="col-lg-4" align="right">
							<p>$0</p>
						</div>
						<div class="col-lg-8">
							<p>Descuento comisiones Housers</p>
						</div>
						<div class="col-lg-4" align="right">
							<p>$0</p>
						</div>
						<div class="col-lg-8">
							<p>Otros</p>
						</div>
						<div class="col-lg-4" align="right">
							<p>$0</p>
						</div>
						<div class="col-lg-12" align="center">
							<a href="{{ asset('dashboard/mis-datos/mis-promociones') }}" class="btn btn-primary">Mis promociones</a>
						</div>
					</div>
				</div>
			</div>
			<br>
		</div>--}}
		<div class="col-lg-6">
			<div class="card" >
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12" align="center">
							<p>Saldo disponible: 
									@if(count($saldoDisponible)>0)
										${{ number_format($saldoDisponible->first()->cantidadSaldoDisponible,0,',','.') }}
									@else
										$0
									@endif</p>
						</div>
						<div class="col-lg-8">
							<p>Saldo total cuenta Housers</p>
						</div>
						<div class="col-lg-4" align="right">
							<p>
								@if(count($saldoDisponible)>0)
									${{ number_format($saldoDisponible->first()->cantidadSaldoDisponible,0,',','.') }}
								@else
									$0
								@endif
							</p>
						</div>

						<div class="col-lg-8">
							<p>Invertido proyectos en financiación</p>
						</div>
						<div class="col-lg-4" align="right">
							<p>${{ number_format($totalProyectoEnFinanciacion,0,',','.') }}</p>
						</div>
						{{-- 
						<div class="col-lg-8">
							<p>Promos pendientes de uso</p>
						</div>
						<div class="col-lg-4" align="right">
							<p>$0</p>
						</div> --}}
						<div class="col-lg-8">
							<p>Disponible para retirada</p>
						</div>
						<div class="col-lg-4" align="right">
							<p>
								@if(count($saldoDisponible)>0)
									${{ number_format($saldoDisponible->first()->cantidadSaldoDisponible,0,',','.') }}
								@else
									$0
								@endif
							</p>
						</div>
						<div class="col-lg-12" align="center">
							<a href="{{ asset('dashboard/mi-cuenta') }}" class="btn btn-primary">Mi Cuenta EsMidas</a>
						</div>
					</div>
				</div>
			</div>
			<br>
		</div>
		{{-- VISTAS PARA CUANDO HACES UNA INVERSION O MAS DE UNA --}}

		<div class="col-lg-12">
			<br>
			<h4>Tus proyectos: situación general</h4>
			<br>
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12">
							<a>
								<img src="https://static.housers.com/assets/images/new-dashboard-2020/housers-ico-proyectos.svg">&nbsp;
								Proyectos ({{ count($propiedades->where('idEstado',5)) }}) <!-- cantidad de propiedades que se han invertido -->
							</a>
						</div>
						<div class="col-lg-12">
							<div id="donutchart" style="width: 318px; height: 285px;"></div>
						</div>
						
					</div>
				</div>
			</div>
			<br>
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12">
							<a>
								<img src="https://static.housers.com/assets/images/new-dashboard-2020/housers-ico-desglose-proyectos.svg">&nbsp;
								Desglose de proyectos
							</a>
						</div>
						<div class="col-lg-12">
							<br>
							<div class="row">
								<div class="col-lg-6" align="left">
									<p>Invertidos</p>
								</div>
								<div class="col-lg-6" align="right">
									<p>{{ count($arrayIdPropiedadSinDuplicar[0]) }}</p>
								</div>
								<div class="col-lg-6" align="left">
									<p>En financiación</p>
								</div>
								<div class="col-lg-6" align="right">
									<p>{{ count($propiedades->where('idEstado',4)) }}</p>
								</div>
								<div class="col-lg-6" align="left">
									<p>Financiados</p>
								</div>
								<div class="col-lg-6" align="right">
									<p>{{ count($propiedades->where('idEstado',5)) }}</p>
								</div>
								<div class="col-lg-6" align="left">
									<p>No financiados</p>
								</div>
								<div class="col-lg-6" align="right">
									<p>{{ count($propiedades->where('idEstado',7)) }}</p>
								</div>
								<div class="col-lg-6" align="left">
									<p>Finalizados</p>
								</div>
								<div class="col-lg-6" align="right">
									<p>{{ count($propiedades->where('idEstado',6)) }}</p>
								</div>
								<div class="col-lg-6" align="left">
									<p>Vendidos CCD</p>
								</div>
								<div class="col-lg-6" align="right">
									<p>0</p>
								</div>
								<br>
								<div class="col-lg-12" align="center">
									<a href="{{ asset('dashboard/mis-inversiones') }}" class="btn btn-primary" ><small>MIS INVERSIONES</small></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12">
							<a>
								<img src="https://static.housers.com/assets/images/new-dashboard-2020/housers-ico-estado-proyectos.svg">&nbsp;
								Estado de proyectos ({{ count($propiedades->where('idEstado',5)) }}) <!-- cantidad de propiedades que se han invertido -->
							</a>
						</div>
						<div class="col-lg-12">
							<br>
							<div id="donutchart2" style="width: 318px; height: 285px;"></div>
						</div>
					</div>
				</div>
			</div>
			<br>
		</div>
		<div class="col-lg-12">
			<br>
			<br>
			<h4>Tus proyectos: datos financieros</h4>
			<br>
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12">
							<a>
								<img class="smaller" src="https://static.housers.com/assets/images/new-dashboard-2020/housers-ico-proyectos-finalizados.svg">&nbsp;
								Proyectos finalizados: 0 <!-- cantidad de propiedades que se han invertido -->
							</a>
						</div>
						<div class="col-lg-12">
							<br>
							 <div class="row">
							 	<div class="col-lg-7" align="left">
							 		<p>Rentabilidad acumulada</p>
							 	</div>
							 	<div class="col-lg-5" align="right">
							 		<p>0,00 %</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>TIR media</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>0,00 %</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Beneficio neto</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>$0</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Capital invertido</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>$0</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Capital devuelto</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>$0</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Rendimiento bruto</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>$0</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Promociones proyecto</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>$0</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Retenciones</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>$0</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Comisiones Housers</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>$0</p>
							 	</div>
							 </div>
						</div>
					</div>
				</div>
			</div>
			<br>
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12">
							<a>
								<img class="smaller" src="https://static.housers.com/assets/images/new-dashboard-2020/housers-ico-proyectos-activos.svg">&nbsp;
								Proyectos activos: 2
							</a>
						</div>
						<div class="col-lg-12">
							<br>
							 <div class="row">
							 	<div class="col-lg-7" align="left">
							 		<p>Rentabilidad provisional</p>
							 	</div>
							 	<div class="col-lg-5" align="right">
							 		<p>0,00 %</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Beneficio neto</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>$0</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Capital invertido</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>${{ number_format($total,0,',','.') }}</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Devoluciones parciales de capital</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>$0</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Rendimiento bruto</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>$0</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Promociones proyecto</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>$0</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Retenciones</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>$0</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Comisiones Housers</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>$0</p>
							 	</div>
							 	<div class="col-lg-12" align="center">
							 		<a href="{{ asset('dashboard/mis-inversiones') }}" class="btn btn-primary"><small>MIS INVERSIONES</small></a>
							 	</div>
							 </div>
						</div>
					</div>
				</div>
			</div>
			<br>
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12">
							<a>
								<img class="smaller" src="https://static.housers.com/assets/images/new-dashboard-2020/housers-ico-operaciones-ccd.svg">&nbsp;
								Operaciones CCD <!-- cantidad de propiedades que se han invertido -->
							</a>
						</div>
						<div class="col-lg-12">
							<br>
							 <div class="row">
							 	<div class="col-lg-6" align="left">
							 		<p>Balance</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>$0</p>
							 	</div>
							 	<div class="col-lg-7" align="left">
							 		<p>Operaciones de compra</p>
							 	</div>
							 	<div class="col-lg-5" align="right">
							 		<p>0</p>
							 	</div>
							 	<div class="col-lg-7" align="left">
							 		<p>Fracciones adquiridas</p>
							 	</div>
							 	<div class="col-lg-5" align="right">
							 		<p>0</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Precio de compra</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>$0</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Balance de compra</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>$0</p>
							 	</div>
							 	<div class="col-lg-5" align="left">
							 		<p>Operaciones de venta</p>
							 	</div>
							 	<div class="col-lg-7" align="right">
							 		<p>0</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Fracciones vendidas</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>0</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Coste adquisición</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>$0</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Precio de venta</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>$0</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Balance de venta</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>$0</p>
							 	</div>
							 </div>
						</div>
					</div>
				</div>
			</div>
			<br>
		</div>
	</div>
		<br>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      ['Real State',     11],
      ['Corporate',      4],
      ['Green',    3]
    ]);

    var options = {
      pieHole: 0.9,
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
  }
</script>
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      ['Sin incidencia',     11],
      ['Vencido',      2],
      ['Reestructurado',  2],
      ['En recobro', 2]
    ]);

    var options = {
      pieHole: 0.9,
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart2'));
    chart.draw(data, options);
  }
</script>
@endsection