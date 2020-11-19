@extends('layouts.public.app')
@section('title')
Mi cuenta
@endsection
<style type="text/css">
	.card{
		box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);"
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
									<th><small>MES EFECTO</small></th>
									<th><small>AÑO EFECTO</small></th>
									<th><small>FECHA</small></th>
									<th><small>DESCRIPCIÓN</small></th>
									<th><small>IMPORTE</small></th>
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