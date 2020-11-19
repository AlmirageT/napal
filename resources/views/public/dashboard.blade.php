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
			<br>
		</div>
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
							<button class="btn btn-primary">Mis inversiones</button>
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
							<button class="btn btn-primary">Mis promociones</button>
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
							<button class="btn btn-primary">Mi cuenta housers</button>
						</div>
					</div>
				</div>
			</div>
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
					</div>
				</div>
			</div>
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
					</div>
				</div>
			</div>
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
					</div>
				</div>
			</div>
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
					</div>
				</div>
			</div>
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
					</div>
				</div>
			</div>
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
					</div>
				</div>
			</div>
		</div>
	</div>
		<br>
</div>
@endsection