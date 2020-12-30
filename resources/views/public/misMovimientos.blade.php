@extends('layouts.public.app')
@section('title')
Mis Movimientos
@endsection
<style type="text/css">
	.card{
		box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
	}
</style>
@section('content')
<br>
<div class="container">
	<div class="row">
		<div class="col-lg-12" align="center"><h4>Mis movimientos</h4><br><br></div>
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-3">
									<select class="form-control">
										<option>Tipo</option>
									</select>
								</div>
								<div class="col-lg-3">
									<select class="form-control">
										<option>Oportunidad</option>
									</select>
								</div>
								<div class="col-lg-2">
									<input type="date" name="" class="form-control">
								</div>
								<div class="col-lg-2">
									<input type="date" name="" class="form-control">
								</div>
								<div class="col-lg-2" align="right">
									<button class="btn btn-danger"><small>BUSCAR</small></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<br>
		<br>
		</div>
		<div class="col-lg-12">
			<div class="card">
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
						<div align="center">
							{{ $instruccionesBancarias->links() }}
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="col-lg-12" align="right">
						<button class="btn btn-info"><small>EXPORTAR (.CSV)</small></button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
</div>
@endsection