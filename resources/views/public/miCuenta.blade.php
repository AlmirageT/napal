@extends('layouts.public.app')
@section('title')
Mi cuenta
@endsection
<style type="text/css">
	.card{
		box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);"
	}
    @media only screen and (max-width: 390px) {
    	.img-1{
    		margin-right: 160px;
    	}
    	.img-2{
    		margin-left: 168px;
			margin-top: -179px;
    	}
    }
    @media only screen and (min-width: 391px) and (max-width: 415px) {
    	.img-1{
    		margin-right: 180px;
    	}
    	.img-2{
    		margin-left: 168px;
			margin-top: -179px;
    	}
    }
    @media only screen and (min-width: 416px) and (max-width: 450px) {
    	.img-1{
    		margin-right: 200px;
    	}
    	.img-2{
    		margin-left: 190px;
			margin-top: -179px;
    	}
    }
    @media only screen and (min-width: 451px) and (max-width: 512px) {
    	.img-1{
    		margin-right: 230px;
    	}
    	.img-2{
    		margin-left: 220px;
			margin-top: -179px;
    	}
    }
    @media only screen and (min-width: 513px) and (max-width: 550px) {
    	.img-1{
    		margin-right: 250px;
    	}
    	.img-2{
    		margin-left: 240px;
			margin-top: -179px;
    	}
    }
    @media only screen and (min-width: 551px) and (max-width: 767px) {
    	.img-1{
    		margin-right: 290px;
    	}
    	.img-2{
    		margin-left: 256px;
			margin-top: -179px;
    	}
    }
    @media only screen and (min-width: 768px) and (max-width: 991px) {
    	.img-1{
    		margin-right: 380px;
    	}
    	.img-2{
    		margin-left: 350px;
			margin-top: -179px;
    	}
    }
</style>
@section('content')
<br>
<div class="container">
	<div class="row">
		<div class="col-lg-4"></div>
		<div class="col-lg-4" align="center"><h3>MI CUENTA</h3><br><br></div>
		<div class="col-lg-4" align="right">
			<a href="{{ asset('dashboard/oportunidades') }}" class="btn btn-danger">Invierte</a>

		</div>
		<div class="col-lg-4">
			<div class="card" style="background-color: #8FCCC9">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12"><h4 style="color: #fff;"><small>Cuenta Housers: posición</small></h4><br></div>
						<div class="col-lg-6" align="left">
							<p style="color: #fff;">Saldo real</p>
						</div>
						<div class="col-lg-6" align="right">
							<p style="color: #fff;">
								@if (count($saldoDisponible)>0)
								${{ number_format($saldoDisponible->first()->cantidadSaldoDisponible,0,',','.') }}
								@else
								$0
								@endif
							</p>
						</div>
						<div class="col-lg-6" align="left">
							<p style="color: #fff;">Saldo disponible</p>
						</div>
						<div class="col-lg-6" align="right">
							<p style="color: #fff;">
								@if (count($saldoDisponible)>0)
								${{ number_format($saldoDisponible->first()->cantidadSaldoDisponible,0,',','.') }}
								@else
								$0
								@endif
							</p>
						</div>
						<div class="col-lg-6" align="left">
							<p style="color: #fff;">Comprometido</p>
						</div>
						<div class="col-lg-6" align="right">
							<p style="color: #fff;">${{ number_format($saldoComprometido,0,',','.') }}</p>
						</div>
						<div class="col-lg-12">
							<br>
							<a href="{{ asset('dashboard/mi-cuenta/movimientos') }}" class="btn btn-light" style="width: 100%;"><small>VER MOVIMIENTOS</small></a>
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
						<div class="col-lg-12"><h4><small>Cuentas asociadas</small></h4><br></div>
						<div class="col-lg-12" align="center">
							<p style="margin-top: 43px; margin-bottom: 58px;">Cuentas asociadas: {{ count($cuentaBancariaUsuario) }}</p>
						</div>
						<div class="col-lg-12">
							<br>
							<a href="{{ asset('dashboard/mi-cuenta/cuentas-bancarias') }}" class="btn btn-primary" style="width: 100%;color: #fff;"><small>VER CUENTAS</small></a>
						</div>						
					</div>
				</div>
			</div>
			<br>

		</div>
		<div class="col-lg-4">
			<div class="card" style="background-color: #13294A">
				<div class="card-body">
					<div class="row" style="height: 238px;">
						<div class="col-lg-12"><h4 style="color: #fff;"><small>Operar</small></h4><br></div>
						<div class="col-lg-6 img-1" align="center">
							<img src="https://static.housers.com/assets/images/icons/dashboard/icon-ingresar-white.svg" style="display: block; margin: 0 auto;">
							<br>
							<p style="color: #fff;">Ingresar fondos</p>
							<br>
							<a href="{{ asset('dashboard/mi-cuenta/ingresos') }}" class="btn btn-primary" style="color: #fff;width: 100%;"><small>INGRESAR</small></a>
						</div>
						<div class="col-lg-6 img-2" align="center">
							<img src="https://static.housers.com/assets/images/icons/dashboard/icon-retirar-white.svg" style="display: block; margin: 0 auto;">
							<br>
							<p style="color: #fff;">Retirar fondos</p>
							<br>
							<a href="{{ asset('dashboard/mi-cuenta/retiros') }}" class="btn btn-primary" style="color: #fff;width: 100%;"><small>RETIRAR</small></a>
						</div>
					</div>
				</div>
			</div>
		<br>
		<br>
		</div>
		<div class="col-lg-12"><h4>MIS ENTRADAS Y SALIDAS</h4><br><br></div>
		<div class="col-lg-6">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-6">
							<a>
								<img src="https://static.housers.com/assets/images/dashboard-cuenta/ic_income_black.svg" class="h--padding-right-10">&nbsp;
								ENTRADAS
							</a>
						<br>
						</div>
						<div class="col-lg-6" align="right">
							<h4>${{ number_format($totalIngresos,0,',','.') }}</h4>
						<br>
						</div>
						<div class="col-lg-6" align="left">
							<p>Ingresos por transferencia</p>
						</div>
						<div class="col-lg-6" align="right">
							<p>${{ number_format($totalTransf,0,',','.') }}</p>
						</div>
						<div class="col-lg-6" align="left">
							<p>Ingresos por otros pagos</p>
						</div>
						<div class="col-lg-6" align="right">
							<p>${{ number_format($otrosPagos,0,',','.') }}</p>
						</div>
						<div class="col-lg-6" align="left">
							<p>Ingresos por paypal</p>
						</div>
						<div class="col-lg-6" align="right">
							<p>${{ number_format($paypal,0,',','.') }}</p>
						</div>
						{{--  <div class="col-lg-6" align="left">
							<p>Beneficios por venta de fracciones</p>
						</div>
						<div class="col-lg-6" align="right">
							<p>0,00 €</p>
						</div>
						<div class="col-lg-6" align="left">
							<p>Ingresos por promociones</p>
						</div>
						<div class="col-lg-6" align="right">
							<p>0,00 €</p>
						</div>--}}
						<div class="col-lg-6" align="left">
							<p>Devolución capital</p>
						</div>
						<div class="col-lg-6" align="right">
							<p>$0</p>
						</div>
					</div>
				</div>
			</div>
			<br>

		</div>
		<div class="col-lg-6">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-6">
							<a>
								<img src="https://static.housers.com/assets/images/dashboard-cuenta/ic_spent_black.svg" class="h--padding-right-10">&nbsp;
								SALIDAS
							</a>
						<br>
						</div>
						<div class="col-lg-6" align="right">
							<h4>${{ number_format($totalInversion,0,',','.') }}</h4>
						<br>
						</div>
						<div class="col-lg-6" align="left">
							<p>Inversiones</p>
						</div>
						<div class="col-lg-6" align="right">
							<p>${{ number_format($totalInversion,0,',','.') }}</p>
						</div>
						<div class="col-lg-6" align="left">
							<p>Inversiones en proyectos cerrados</p>
						</div>
						<div class="col-lg-6" align="right">
							<p>${{ number_format($totalCuentaBancaria,0,',','.') }}</p>
						</div>
						{{-- <div class="col-lg-6" align="left">
							<p>Impuestos</p>
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
						<div class="col-lg-6" align="left">
							<p>Comisión pago tarjeta</p>
						</div>
						<div class="col-lg-6" align="right">
							<p>0,00 €</p>
						</div>--}}
						<div class="col-lg-6" align="left">
							<p>Transferencias a cuenta bancaria</p>
						</div>
						<div class="col-lg-6" align="right">
							<p>${{ number_format($egresoTotal,0,',','.') }}</p>
						</div>
						{{-- 
						<div class="col-lg-6" align="left">
							<p>Pérdidas por venta de fracciones</p>
						</div>
						<div class="col-lg-6" align="right">
							<p>0,00 €</p>
						</div> --}}
					</div>
				</div>
			</div>
			<br>

		<br>
		<br>
		</div>
		<div class="col-lg-12">
			<h4>MOVIMIENTOS CUENTA</h4><br><br>
		</div>
		<div class="col-lg-12">
			<div class="card" >
				<div class="card-body">
					<div class="table table-responsive">
						<table class="table">
						  <thead>
						    <tr>
						      <th scope="col"><small>FECHA SOLICITUD</small></th>
						      <th scope="col"><small>DESCRIPCIÓN</small></th>
						      <th scope="col"><small>IMPORTE</small></th>
						      <th scope="col"><small>VALIDADA</small></th>
						      <th scope="col"><small>ACCIONES</small></th>
						    </tr>
						  </thead>
						  <tbody>
						  	@if (count($instruccionesBancarias)>0)
						  		@foreach ($instruccionesBancarias as $instruccionBancaria)
							  		<tr>
							  			<td>{{ date("d-m-Y", strtotime($instruccionBancaria->fechaSolicitud)) }}</td>
							  			<td>{{ $instruccionBancaria->concepto }}</td>
							  			<td>${{ number_format($instruccionBancaria->importe,0,',','.') }}</td>
							  			<td>
							  				@if ($instruccionBancaria->validado == 0)
							  					Sin Validar
							  				@else
							  					Validada
							  				@endif
							  			</td>
							  			<td>
							  				@if ($instruccionBancaria->validado == 0 && $instruccionBancaria->cancelada == 0)
							  					<a href="{{ asset('dashboard/cancelar-solicitud') }}/{{ Crypt::encrypt($instruccionBancaria->idIntruccionBancaria) }}" onclick="confirm('¿Desea Cancelar la Solicitud?')" class="btn btn-danger">Cancelar Solicitud</a>
							  				@else
							  					@if ($instruccionBancaria->validado == 0 && $instruccionBancaria->cancelada == 1)
							  						Solicitud Cancelada
							  					@endif
					  							@if ($instruccionBancaria->validado == 1)
						  							Solicitud Aceptada
					  							@endif
							  				@endif
							  			</td>
							  		</tr>
						  		@endforeach
						  	@else
							  	<tr>
									<td colspan="5" style="text-align: center !important;">No hay resultados</td>
								</tr>
						  	@endif
						  </tbody>
						</table>
						<br>
						<div align="center">
							<a href="{{ asset('dashboard/mi-cuenta/movimientos') }}" class="btn btn-light" ><small>VER TODOS LOS MOVIMIENTOS</small></a>
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
