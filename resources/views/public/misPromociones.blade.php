@extends('layouts.public.app')
<style type="text/css">
	.card{
		box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
	}
</style>
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12" align="center">
			<br>
			<h4>MIS PROMOCIONES</h4>
			<br>
			<br>
		</div>
		<div class="col-lg-5">
			<div class="card" >
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12"><h6>INSERTAR CÓDIGO PROMOCIONAL</h6><br></div>
						<div class="col-lg-5" align="center">
							<img src="https://static.housers.com/assets/images/dashboard/housers-ico-promos.svg" class="h-widget__bg">
						</div>
						<div class="col-lg-7" align="left">
							<p><small>Escribe tu codigo para aplicar la promoción.</small></p>
						</div>
						<div class="col-lg-12"><br></div>
						<div class="col-lg-12">
							<input type="text" name="codigo" class="form-control" placeholder="Código">
							<br>
						</div>
						<div class="col-lg-12" align="center"><button class="btn btn-light"><small>APLICAR CÓDIGO</small></button></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-7">
			<div class="card" style="background-color: #13294A">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12"><h6 style="color: #fff;">PROMOCIÓN INVITA A UN AMIGO</h6><br></div>
						<div class="col-lg-4" align="center">
							<img src="https://static.housers.com/assets/images/icons/dashboard/icon-promo-friend.svg" class="h-widget__bg">
						</div>
						<div class="col-lg-8" align="left">
							<h6 style="color: #fff;">¡Quien tiene un amigo tiene un tesoro! <br></h6>
							<p style="color: #fff;"><small>Tu confianza tiene recompensa. <br>Invita a tantos amigos como quieras a formar parte de la comunidad Housers y os beneficiáis los dos.</small></p>
							<br>
						</div>
						<div class="col-lg-12" align="center"><a href="{{ asset('dashboard/promo-amigo') }}" class="btn btn-info"><small>INVITA A UN AMIGO</small></a></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-12">
			<br>
			<br>
			<br>
			<div class="card">
				<div class="card-body">
					<div class="table table-reponsive">
						<table class="table">
							<thead>
								<tr>
									<th><small>PROMOCIÓN</small></th>
									<th><small>CÓDIGO</small></th>
									<th><small>FECHA INICIO</small></th>
									<th><small>FECHA FIN</small></th>
									<th><small>ESTADO</small></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="5" style="text-align: center !important;">No hay resultados</td>
								</tr>
							</tbody>
						</table>
					</div>
					<br>
					<div align="center"><br><h6>PROMOCIÓN INVITA A UN AMIGO</h6><br><br></div>
					<div class="table table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th><small>PROMOCIÓN</small></th>
									<th><small>ESTADO</small></th>
									<th><small>TU PREMIO</small></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="5" style="text-align: center !important;">No hay resultados</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
</div>
@endsection