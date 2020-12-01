@extends('layouts.public.app')
<style type="text/css">
	.card{
		box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
	}
</style>
@section('title')
Dashborad
@endsection
@section('content')
<br>
<div class="container">
	<div class="row">
		<div class="col-lg-7">
			<h3>Bienvenid@ Usuari@</h3>
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
								<h3 style="color: #fff;">$0</h3>
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
								<h3 style="color: #fff;">$0</h3>
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
		<div class="col-lg-4">
			<div class="card" >
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12" align="center">
							<p>Inversión: 0,00 €</p>
						</div>
						<div class="col-lg-8">
							<p>Proyectos financiados</p>
						</div>
						<div class="col-lg-4" align="right">
							<p>$0</p>
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
							<p>$0</p>
						</div>
						<div class="col-lg-12" align="center">
							<a href="{{ asset('dashboard/mis-inversiones') }}" class="btn btn-primary">Mis inversiones</a>
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
						<div class="col-lg-12" align="center">
							<p>Beneficios promos: 0,00 €</p>
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
		</div>
		<div class="col-lg-4">
			<div class="card" >
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12" align="center">
							<p>Saldo disponible: 0,00 €</p>
						</div>
						<div class="col-lg-8">
							<p>Saldo total cuenta Housers</p>
						</div>
						<div class="col-lg-4" align="right">
							<p>$0</p>
						</div>

						<div class="col-lg-8">
							<p>Invertido proyectos en financiación</p>
						</div>
						<div class="col-lg-4" align="right">
							<p>$0</p>
						</div>

						<div class="col-lg-8">
							<p>Promos pendientes de uso</p>
						</div>
						<div class="col-lg-4" align="right">
							<p>$0</p>
						</div>
						<div class="col-lg-8">
							<p>Disponible para retirada</p>
						</div>
						<div class="col-lg-4" align="right">
							<p>$0</p>
						</div>
						<div class="col-lg-12" align="center">
							<a href="{{ asset('dashboard/mi-cuenta') }}" class="btn btn-primary">Mi cuenta housers</a>
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
								Proyectos (2) <!-- cantidad de propiedades que se han invertido -->
							</a>
						</div>
						<div class="col-lg-12">
							<br>
							<div id="chart_project_type" class="charts-oportunidades" data-value-green="0" data-value-lending="0" data-value-realestate="2" data-highcharts-chart="0"><div id="highcharts-jji3jv5-0" style="position: relative; overflow: hidden; width: 300px; height: 200px; text-align: left; line-height: normal; z-index: 0; font-family: &quot;Rubik&quot;, sans-serif; font-weight: normal; color: rgb(10, 10, 10); left: 0.5px; top: 0.699951px;" class="highcharts-container "><svg version="1.1" class="highcharts-root " style="font-family:&quot;Rubik&quot;,sans-serif;font-size:12px;font-weight:normal;color:#0a0a0a;fill:#0a0a0a;" xmlns="http://www.w3.org/2000/svg" width="300" height="200" viewBox="0 0 300 200"><desc>Created with Highcharts 5.0.14</desc><defs><clipPath id="highcharts-jji3jv5-1"><rect x="0" y="0" width="300" height="199" fill="none"></rect></clipPath></defs><rect fill="rgba(255, 255, 255, 0.0)" class="highcharts-background" x="0" y="0" width="300" height="200" rx="0" ry="0"></rect><rect fill="none" class="highcharts-plot-background" x="0" y="0" width="300" height="199"></rect><g class="highcharts-pane-group"></g><rect fill="none" class="highcharts-plot-border" x="0" y="0" width="300" height="199"></rect><g class="highcharts-series-group"><g class="highcharts-series highcharts-series-0 highcharts-pie-series highcharts-color-undefined highcharts-tracker " transform="translate(0,0) scale(1 1)"><path fill="#4EB4BC" d="M 149.98177124826927 10.000001856354146 A 89.5 89.5 0 1 1 149.87568629554258 10.000086334662399 M 149.87568629554258 10.000086334662399 A 89.5 89.5 0 1 0 149.98177124826927 10.000001856354146 " class="highcharts-halo highcharts-color-0" fill-opacity="0.25"></path><path fill="#4EB4BC" d="M 149.98177124826927 10.500001856354146 A 89.5 89.5 0 1 1 149.87568629554258 10.500086334662399 M 149.8843882548546 16.765080291236032 A 83.235 83.235 0 1 0 149.98304726089043 16.765001726409366 " transform="translate(0,0)" stroke-linejoin="round" class="highcharts-point highcharts-color-0 "></path><path fill="#2867B2" d="M 149.96518625644816 10.500006770931762 A 89.5 89.5 0 0 1 149.87568629554258 10.500086334662399 L 149.8843882548546 16.765080291236032 A 83.235 83.235 0 0 0 149.96762321849678 16.765006296966547 Z" transform="translate(0,0)" stroke-linejoin="round" class="highcharts-point highcharts-color-1 "></path><path fill="#83b378" d="M 149.96518625644816 10.500006770931762 A 89.5 89.5 0 0 1 149.87568629554258 10.500086334662399 L 149.8843882548546 16.765080291236032 A 83.235 83.235 0 0 0 149.96762321849678 16.765006296966547 Z" transform="translate(0,0)" stroke-linejoin="round" class="highcharts-point highcharts-color-2 "></path></g><g class="highcharts-markers highcharts-series-0 highcharts-pie-series highcharts-color-undefined " transform="translate(0,0) scale(1 1)"></g></g><g class="highcharts-legend" transform="translate(38,211)"><rect fill="none" class="highcharts-legend-box" rx="0" ry="0" x="0" y="0" width="225" height="59" visibility="visible"></rect><g><g><g class="highcharts-legend-item highcharts-pie-series highcharts-color-0" transform="translate(8,3)"><rect x="0" y="4" width="12" height="12" fill="#4EB4BC" class="highcharts-point"></rect></g><g class="highcharts-legend-item highcharts-pie-series highcharts-color-1" transform="translate(126,3)"><rect x="0" y="4" width="12" height="12" fill="#2867B2" class="highcharts-point"></rect></g><g class="highcharts-legend-item highcharts-pie-series highcharts-color-2" transform="translate(8,27)"><rect x="0" y="4" width="12" height="12" fill="#83b378" class="highcharts-point"></rect></g></g></g></g><g class="highcharts-label highcharts-tooltip highcharts-color-0" style="cursor:default;pointer-events:none;white-space:nowrap;" transform="translate(161,-9999)" opacity="0" visibility="visible"><path fill="none" class="highcharts-label-box highcharts-tooltip-box" d="M 3.5 0.5 L 82.5 0.5 C 85.5 0.5 85.5 0.5 85.5 3.5 L 85.5 40.5 C 85.5 43.5 85.5 43.5 82.5 43.5 L 3.5 43.5 C 0.5 43.5 0.5 43.5 0.5 40.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" isShadow="true" stroke="#000000" stroke-opacity="0.049999999999999996" stroke-width="5" transform="translate(1, 1)"></path><path fill="none" class="highcharts-label-box highcharts-tooltip-box" d="M 3.5 0.5 L 82.5 0.5 C 85.5 0.5 85.5 0.5 85.5 3.5 L 85.5 40.5 C 85.5 43.5 85.5 43.5 82.5 43.5 L 3.5 43.5 C 0.5 43.5 0.5 43.5 0.5 40.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" isShadow="true" stroke="#000000" stroke-opacity="0.09999999999999999" stroke-width="3" transform="translate(1, 1)"></path><path fill="none" class="highcharts-label-box highcharts-tooltip-box" d="M 3.5 0.5 L 82.5 0.5 C 85.5 0.5 85.5 0.5 85.5 3.5 L 85.5 40.5 C 85.5 43.5 85.5 43.5 82.5 43.5 L 3.5 43.5 C 0.5 43.5 0.5 43.5 0.5 40.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" isShadow="true" stroke="#000000" stroke-opacity="0.15" stroke-width="1" transform="translate(1, 1)"></path><path fill="rgba(247,247,247,0.85)" class="highcharts-label-box highcharts-tooltip-box" d="M 3.5 0.5 L 82.5 0.5 C 85.5 0.5 85.5 0.5 85.5 3.5 L 85.5 40.5 C 85.5 43.5 85.5 43.5 82.5 43.5 L 3.5 43.5 C 0.5 43.5 0.5 43.5 0.5 40.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" stroke="#4EB4BC" stroke-width="1"></path><text x="8" style="font-size:12px;color:#333333;fill:#333333;" y="20"><tspan style="font-size: 10px">Real Estate</tspan><tspan style="font-weight:bold" x="8" dy="15">2</tspan><tspan dx="0"> (100.00 %)</tspan></text></g></svg><div class="highcharts-legend" style="position: absolute; left: 38px; top: 211px; opacity: 1;"><div style="position: absolute; left: 0px; top: 0px; opacity: 1;"><div style="position: absolute; left: 0px; top: 0px; opacity: 1;"><div class="highcharts-legend-item highcharts-pie-series highcharts-color-0" style="position: absolute; left: 8px; top: 3px; opacity: 1;"><span style="font-family: &quot;Rubik&quot;, sans-serif; font-size: 12px; position: absolute; white-space: nowrap; color: rgb(51, 51, 51); font-weight: normal; text-overflow: ellipsis; cursor: pointer; overflow: hidden; margin-left: 0px; margin-top: 0px; left: 17px; top: 3px; fill: rgb(51, 51, 51);" transform="translate(0,0)">Real Estate (2)</span></div><div class="highcharts-legend-item highcharts-pie-series highcharts-color-1" style="position: absolute; left: 126px; top: 3px; opacity: 1;"><span style="font-family: &quot;Rubik&quot;, sans-serif; font-size: 12px; position: absolute; white-space: nowrap; color: rgb(51, 51, 51); font-weight: normal; text-overflow: ellipsis; cursor: pointer; overflow: hidden; margin-left: 0px; margin-top: 0px; left: 17px; top: 3px; fill: rgb(51, 51, 51);" transform="translate(0,0)">Corporate (0)</span></div><div class="highcharts-legend-item highcharts-pie-series highcharts-color-2" style="position: absolute; left: 8px; top: 27px; opacity: 1;"><span style="font-family: &quot;Rubik&quot;, sans-serif; font-size: 12px; position: absolute; white-space: nowrap; color: rgb(51, 51, 51); font-weight: normal; text-overflow: ellipsis; cursor: pointer; overflow: hidden; margin-left: 0px; margin-top: 0px; left: 17px; top: 3px; fill: rgb(51, 51, 51);" transform="translate(0,0)">Green (0)</span></div></div></div></div></div></div>
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
									<p>2</p>
								</div>
								<div class="col-lg-6" align="left">
									<p>En financiación</p>
								</div>
								<div class="col-lg-6" align="right">
									<p>0</p>
								</div>
								<div class="col-lg-6" align="left">
									<p>Financiados</p>
								</div>
								<div class="col-lg-6" align="right">
									<p>2</p>
								</div>
								<div class="col-lg-6" align="left">
									<p>No financiados</p>
								</div>
								<div class="col-lg-6" align="right">
									<p>0</p>
								</div>
								<div class="col-lg-6" align="left">
									<p>Finalizados</p>
								</div>
								<div class="col-lg-6" align="right">
									<p>0</p>
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
								Estado de proyectos (2) <!-- cantidad de propiedades que se han invertido -->
							</a>
						</div>
						<div class="col-lg-12">
							<br>
							<div class="chart-container">
								<div id="chart_project_status" class="charts-oportunidades" data-value-ontime="2" data-value-renegotiatedloanontime="0" data-value-incidenceontime="0" data-value-delayed="0" data-value-renegotiatedloan="0" data-value-incidence="0" data-value-recovery="0" data-text-ontimetotal="Total en plazo" data-text-delayedtotal="Total retrasados" data-text-ontime="Sin incidencia" data-text-ontimerenegotiated="En plazo reestructurados" data-text-ontimeincidence="En plazo con incidencias" data-text-delayed="Retrasados" data-text-delayedincidence="Incidencia" data-text-delayedrenegotiated="Reestructurado" data-text-delayedrecovery="En recobro" data-highcharts-chart="1"><div id="highcharts-jji3jv5-3" style="position: relative; overflow: hidden; width: 300px; height: 200px; text-align: left; line-height: normal; z-index: 0; font-family: &quot;Rubik&quot;, sans-serif; font-weight: normal; color: rgb(10, 10, 10); left: 0.5px; top: 0.699951px;" class="highcharts-container "><svg version="1.1" class="highcharts-root " style="font-family:&quot;Rubik&quot;,sans-serif;font-size:12px;font-weight:normal;color:#0a0a0a;fill:#0a0a0a;" xmlns="http://www.w3.org/2000/svg" width="300" height="200" viewBox="0 0 300 200"><desc>Created with Highcharts 5.0.14</desc><defs><clipPath id="highcharts-jji3jv5-4"><rect x="0" y="0" width="300" height="199" fill="none"></rect></clipPath></defs><rect fill="rgba(255, 255, 255, 0.0)" class="highcharts-background" x="0" y="0" width="300" height="200" rx="0" ry="0"></rect><rect fill="none" class="highcharts-plot-background" x="0" y="0" width="300" height="199"></rect><g class="highcharts-pane-group"></g><rect fill="none" class="highcharts-plot-border" x="0" y="0" width="300" height="199"></rect><g class="highcharts-series-group"><g class="highcharts-series highcharts-series-0 highcharts-pie-series highcharts-color-undefined highcharts-tracker " transform="translate(0,0) scale(1 1)"><path fill="#1A71C1" d="M 149.98177124826927 10.000001856354146 A 89.5 89.5 0 1 1 149.87568629554258 10.000086334662399 M 149.87568629554258 10.000086334662399 A 89.5 89.5 0 1 0 149.98177124826927 10.000001856354146 " class="highcharts-halo highcharts-color-0" fill-opacity="0.25"></path><path fill="#1A71C1" d="M 149.98177124826927 10.500001856354146 A 89.5 89.5 0 1 1 149.87568629554258 10.500086334662399 M 149.8843882548546 16.765080291236032 A 83.235 83.235 0 1 0 149.98304726089043 16.765001726409366 " transform="translate(0,0)" stroke-linejoin="round" class="highcharts-point highcharts-color-0 "></path><path fill="#FCB463" d="M 149.96518625644816 10.500006770931762 A 89.5 89.5 0 0 1 149.87568629554258 10.500086334662399 L 149.8843882548546 16.765080291236032 A 83.235 83.235 0 0 0 149.96762321849678 16.765006296966547 Z" transform="translate(0,0)" stroke-linejoin="round" class="highcharts-point highcharts-color-1"></path><path fill="#DBDBDB" d="M 149.96518625644816 10.500006770931762 A 89.5 89.5 0 0 1 149.87568629554258 10.500086334662399 L 149.8843882548546 16.765080291236032 A 83.235 83.235 0 0 0 149.96762321849678 16.765006296966547 Z" transform="translate(0,0)" stroke-linejoin="round" class="highcharts-point highcharts-color-2 "></path><path fill="#FD7B61" d="M 149.96518625644816 10.500006770931762 A 89.5 89.5 0 0 1 149.87568629554258 10.500086334662399 L 149.8843882548546 16.765080291236032 A 83.235 83.235 0 0 0 149.96762321849678 16.765006296966547 Z" transform="translate(0,0)" stroke-linejoin="round" class="highcharts-point highcharts-color-3"></path></g><g class="highcharts-markers highcharts-series-0 highcharts-pie-series highcharts-color-undefined " transform="translate(0,0) scale(1 1)"></g></g><g class="highcharts-legend" transform="translate(23,211)"><rect fill="none" class="highcharts-legend-box" rx="0" ry="0" x="0" y="0" width="254" height="59" visibility="visible"></rect><g><g><g class="highcharts-legend-item highcharts-pie-series highcharts-color-0" transform="translate(8,3)"><rect x="0" y="4" width="12" height="12" fill="#1A71C1" class="highcharts-point"></rect></g><g class="highcharts-legend-item highcharts-pie-series highcharts-color-1" transform="translate(140,3)"><rect x="0" y="4" width="12" height="12" fill="#FCB463" class="highcharts-point"></rect></g><g class="highcharts-legend-item highcharts-pie-series highcharts-color-2" transform="translate(8,27)"><rect x="0" y="4" width="12" height="12" fill="#DBDBDB" class="highcharts-point"></rect></g><g class="highcharts-legend-item highcharts-pie-series highcharts-color-3" transform="translate(150,27)"><rect x="0" y="4" width="12" height="12" fill="#FD7B61" class="highcharts-point"></rect></g></g></g></g><g class="highcharts-label highcharts-tooltip highcharts-color-0" style="cursor:default;pointer-events:none;white-space:nowrap;" transform="translate(70,-9999)" opacity="0" visibility="visible"><path fill="none" class="highcharts-label-box highcharts-tooltip-box" d="M 3.5 0.5 L 82.5 0.5 C 85.5 0.5 85.5 0.5 85.5 3.5 L 85.5 40.5 C 85.5 43.5 85.5 43.5 82.5 43.5 L 3.5 43.5 C 0.5 43.5 0.5 43.5 0.5 40.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" isShadow="true" stroke="#000000" stroke-opacity="0.049999999999999996" stroke-width="5" transform="translate(1, 1)"></path><path fill="none" class="highcharts-label-box highcharts-tooltip-box" d="M 3.5 0.5 L 82.5 0.5 C 85.5 0.5 85.5 0.5 85.5 3.5 L 85.5 40.5 C 85.5 43.5 85.5 43.5 82.5 43.5 L 3.5 43.5 C 0.5 43.5 0.5 43.5 0.5 40.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" isShadow="true" stroke="#000000" stroke-opacity="0.09999999999999999" stroke-width="3" transform="translate(1, 1)"></path><path fill="none" class="highcharts-label-box highcharts-tooltip-box" d="M 3.5 0.5 L 82.5 0.5 C 85.5 0.5 85.5 0.5 85.5 3.5 L 85.5 40.5 C 85.5 43.5 85.5 43.5 82.5 43.5 L 3.5 43.5 C 0.5 43.5 0.5 43.5 0.5 40.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" isShadow="true" stroke="#000000" stroke-opacity="0.15" stroke-width="1" transform="translate(1, 1)"></path><path fill="rgba(247,247,247,0.85)" class="highcharts-label-box highcharts-tooltip-box" d="M 3.5 0.5 L 82.5 0.5 C 85.5 0.5 85.5 0.5 85.5 3.5 L 85.5 40.5 C 85.5 43.5 85.5 43.5 82.5 43.5 L 3.5 43.5 C 0.5 43.5 0.5 43.5 0.5 40.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" stroke="#1A71C1" stroke-width="1"></path><text x="8" style="font-size:12px;color:#333333;fill:#333333;" y="20"><tspan style="font-size: 10px">Sin incidencia</tspan><tspan style="font-weight:bold" x="8" dy="15">2</tspan><tspan dx="0"> (100.00 %)</tspan></text></g></svg><div class="highcharts-legend" style="position: absolute; left: 23px; top: 211px; opacity: 1;"><div style="position: absolute; left: 0px; top: 0px; opacity: 1;"><div style="position: absolute; left: 0px; top: 0px; opacity: 1;"><div class="highcharts-legend-item highcharts-pie-series highcharts-color-0" style="position: absolute; left: 8px; top: 3px; opacity: 1;"><span style="font-family: &quot;Rubik&quot;, sans-serif; font-size: 12px; position: absolute; white-space: nowrap; color: rgb(51, 51, 51); font-weight: normal; text-overflow: ellipsis; cursor: pointer; overflow: hidden; margin-left: 0px; margin-top: 0px; left: 17px; top: 3px; fill: rgb(51, 51, 51);" transform="translate(0,0)">Sin incidencia (2)</span></div><div class="highcharts-legend-item highcharts-pie-series highcharts-color-1" style="position: absolute; left: 140px; top: 3px; opacity: 1;"><span style="font-family: &quot;Rubik&quot;, sans-serif; font-size: 12px; position: absolute; white-space: nowrap; color: rgb(51, 51, 51); font-weight: normal; text-overflow: ellipsis; cursor: pointer; overflow: hidden; margin-left: 0px; margin-top: 0px; left: 17px; top: 3px; fill: rgb(51, 51, 51);" transform="translate(0,0)">Incidencia (0)</span></div><div class="highcharts-legend-item highcharts-pie-series highcharts-color-2" style="position: absolute; left: 8px; top: 27px; opacity: 1;"><span style="font-family: &quot;Rubik&quot;, sans-serif; font-size: 12px; position: absolute; white-space: nowrap; color: rgb(51, 51, 51); font-weight: normal; text-overflow: ellipsis; cursor: pointer; overflow: hidden; margin-left: 0px; margin-top: 0px; left: 17px; top: 3px; fill: rgb(51, 51, 51);" transform="translate(0,0)">Reestructurado (0)</span></div><div class="highcharts-legend-item highcharts-pie-series highcharts-color-3" style="position: absolute; left: 150px; top: 27px; opacity: 1;"><span style="font-family: &quot;Rubik&quot;, sans-serif; font-size: 12px; position: absolute; white-space: nowrap; color: rgb(51, 51, 51); font-weight: normal; text-overflow: ellipsis; cursor: pointer; overflow: hidden; margin-left: 0px; margin-top: 0px; left: 17px; top: 3px; fill: rgb(51, 51, 51);" transform="translate(0,0)">En recobro (0)</span></div></div></div></div></div></div>
								</div>
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
							 		<p>0,00 €</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Capital invertido</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>0,00 €</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Capital devuelto</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>0,00 €</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Rendimiento bruto</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>0,00 €</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Promociones proyecto</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>0,00 €</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Retenciones</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>0,00 €</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Comisiones Housers</p>
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
							 		<p>0,00 €</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Capital invertido</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>160,00 €</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Devoluciones parciales de capital</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>0,00 €</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Rendimiento bruto</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>0,00 €</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Promociones proyecto</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>0,00 €</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Retenciones</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>0,00 €</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Comisiones Housers</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>0,00 €</p>
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
							 		<p>0,00 €</p>
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
							 		<p>0,00 €</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Balance de compra</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>0,00 €</p>
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
							 		<p>0,00 €</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Precio de venta</p>
							 	</div>
							 	<div class="col-lg-6" align="right">
							 		<p>0,00 €</p>
							 	</div>
							 	<div class="col-lg-6" align="left">
							 		<p>Balance de venta</p>
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
		</div>
	</div>
		<br>
</div>
@endsection