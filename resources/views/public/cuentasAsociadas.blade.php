@extends('layouts.public.app')
@section('title')
Cuentas Asociadas
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12" align="center">
			<h3>Mis cuentas asociadas</h3>
			<br>
		</div>
		<div class="col-lg-12">
			<div class="card" style="box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-8">
							<p>
								Para poder <strong>retirar dinero de tu Cuenta Housers</strong> tienes que asociar a la misma una cuenta bancaria que esté a tu nombre (en el caso de empresa a nombre de la empresa). Puedes registrar <strong>hasta 4 cuentas bancarias diferentes </strong> que podrás cambiar cuando quieras (para poder hacerlo tendrás que volver a subir un documento que demuestre que la nueva cuenta está a tu nombre).
							</p>
						</div>
						<div class="col-lg-4" align="center">
							<p>Cuentas asociadas: {{ count($cuentasBancariasUsuarios) }}</p>
							<a href="{{ asset('dashboard/mi-cuenta/cuentas-bancarias/nueva') }}" class="btn btn-primary"><small>AÑADIR CUENTA BANCARIA</small></a>
						</div>
					</div>
				</div>
			</div>
			<br>
		</div>
		@if(count($cuentasBancariasUsuarios)>0)
			<br>
			<div class="col-lg-12">
				<div class="card" style="box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Titular</th>
										<th>Codigo Swift</th>
										<th>Número Cuenta</th>
										<th>Banco</th>
										<th>Tipo de Cuenta</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($cuentasBancariasUsuarios as $cuentaBancariaUsuario)
										<tr>
											<td>{{ $cuentaBancariaUsuario->titular }}</td>
											<td>{{ $cuentaBancariaUsuario->codigoSwift }}</td>
											<td>{{ $cuentaBancariaUsuario->numeroCuenta }}</td>
											<td>{{ $cuentaBancariaUsuario->nombreBanco }}</td>
											<td>{{ $cuentaBancariaUsuario->nombreTipoCuenta }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<br>
			</div>
		@endif
	</div>
</div>
@endsection