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
	<br>
	<br>
</div>
@endsection