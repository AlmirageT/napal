@extends('layouts.public.app')
@section('title')
Retiros
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12" align="center">
			<h4>Retirar fondos</h4>
			<br>
		</div>
		<div class="col-lg-12">
			<p>Puedes retirar fondos de tu cuenta Housers a tu cuenta bancaria facilitada siempre y cuando esta última esté validada en la pestaña "Tus cuentas bancarias".<br>La cantidad máxima que puedes transferir es de: 90,00 €. Utiliza la "," solo para decimales.</p>
		</div>
		<div class="col-lg-12">
			<div class="card" style="box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-3">
							<div class="form-group">
								<label>Cuenta bancaria</label>
								<select class="form-control">
									<option>Seleccione</option>
								</select>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<label>Concepto</label>
								<input type="text" name="concepto" class="form-control">
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<label>Importe</label>
								<input type="text" name="concepto" class="form-control">
							</div>
						</div>
						<div class="col-lg-3" align="right">
							<button class="btn btn-primary" type="submit"><small>SOLICITAR TRANSFERENCIA</small></button>
						</div>
					</div>
				</div>
			</div>
			<br>
		</div>
	</div>
</div>
@endsection