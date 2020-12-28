@extends('layouts.public.app')
@section('title')
Cuentas Asociadas
@endsection
@section('css')
<style type="text/css">
.custom-input-file {
	height: 46px;
	background-color: #1B7D94;
	color: #fff;
	cursor: pointer;
	font-size: 16px;
	font-weight: bold;
	margin: 0 auto 0;
	min-height: 15px;
	overflow: hidden;
	padding: 10px;
	position: relative;
	text-align: center;
	width: 400px;
}

.custom-input-file .input-file {
	border: 10000px solid transparent;
	cursor: pointer;
	font-size: 10000px;
	margin: 0;
	opacity: 0;
	outline: 0 none;
	padding: 0;
	position: absolute;
	right: -1000px;
	top: -1000px;
}
.custom-input-file-2{
	height: 46px;
	background-color: #1B7D94;
	color: #fff;
	cursor: pointer;
	font-size: 16px;
	font-weight: bold;
	min-height: 15px;
	overflow: hidden;
	padding: 10px;
	position: relative;
	text-align: center;
	width: 400px;
}
.custom-input-file-2 .input-file-2 {
	border: 10000px solid transparent;
	cursor: pointer;
	font-size: 10000px;
	margin: 0;
	opacity: 0;
	outline: 0 none;
	padding: 0;
	position: absolute;
	right: -1000px;
	top: -1000px;
}
</style>
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12" align="center">
			<h3>Añadir cuenta bancaria</h3>
			<br>
		</div>
		<div class="col-lg-12">
			<div class="card" style="box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12">
							<h5>Información de la nueva cuenta</h5>
							<br>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Pais de Origen</label>
								{!! Form::select('idPais', $paises,null,['class'=>"form-control",'placeholder'=>"Seleccione Pais",'required','onchange'=>"bancoPorPais(this.value)"]) !!}
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Nombre del banco</label>
								<select class="form-control" name="idBanco" id="idBanco" onchange="BancoPorTipoCuenta(this.value)">
									<option>Seleccione Banco</option>
								</select>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Tipo de cuenta</label>
								<select class="form-control" name="idTipoCuenta" id="idTipoCuenta">
									<option>Seleccione Tipo de Cuenta</option>
								</select>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Cuenta bancaria</label>
								<input class="form-control" type="text" name="cuentaBancaria">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Codigo BIC/SWIFT</label>
								<input type="text" name="codigoSwift" class="form-control">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<label>Titular</label>
								<input type="text" name="titular" class="form-control">
								
							</div>
							<br>
							<br>
						</div>
						<div class="col-lg-12" align="left">
							<h5>Documento comprobante de tu cuenta bancaria</h5>
						</div>
						<div class="col-lg-6">
							<p>Adjunta un documento bancario, en soporte PDF o similar, donde conste el número de IBAN completo y tu titularidad. Si tienes algún problema al subir esta documentación puedes enviárnosla a soporte@housers.com.</p>
						</div>
						<div class="col-lg-6" align="center">
							<div class="custom-input-file">
								<input type="file" id="fichero-tarifas" class="input-file" value="">
								Subir archivo... (Max 4MB)
							</div>
						</div>
						<div class="col-lg-12">
							<br>
							<br>
						</div>
						{{--  
						<div class="col-lg-12">
							<p>
								<strong>ATENCIÓN:</strong> Si estás registrando una cuenta bancaria online (ej: N26, Compte Nickel, Carrefour Banque (C-SAM), Orange Bank, Sogexia, Revolut (BforBank)), es necesario que adjuntes la siguiente documentación para que la entidad de pago (Lemon Way) valide tu cuenta bancaria:
							</p>
							<ul>
								<li>Segundo documento de identidad: el documento de identificación debe ser diferente al que ya tienes en tu perfil, estar en vigor y legible. Recuerda que debes adjuntar ambas caras del documento en un mismo archivo. </li>
								<li>
									<br>
									<div class="custom-input-file-2 col-lg-6" align="center">
										<input type="file" id="fichero-tarifas" class="input-file-2" value="">
										Subir archivo... (Max 4MB)
									</div>
								</li>
								<br>
								<li>
									Documento comprobante de tu domicilio: en este documento, para que pueda ser validado, deberá constar tu nombre y tener fecha de los últimos 3 meses (servirá cualquier recibo o factura vinculado a la vivienda como los de la luz, el gas, internet o teléfono fijo, el seguro de vivienda, el alquiler, el empadronamiento o el pago de impuestos como basuras o IBI, etc.). 
								</li>
								<li>
									<br>
									<div class="custom-input-file-2 col-lg-6" align="center">
										<input type="file" id="fichero-tarifas" class="input-file-2" value="">
										Subir archivo... (Max 4MB)
									</div>
								</li>
							</ul>
						</div>
						<div class="col-lg-12">
							<hr>
						</div>
						<div class="col-lg-12" align="right">
							<button type="submit" class="btn btn-primary"><small>GUARDAR CAMBIOS</small></button>
						</div>
						--}}
					</div>
				</div>
			</div>
			<br>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	function bancoPorPais(idPais) {
		$.get('{{ asset('banco-por-pais') }}/'+idPais,function(data,status){
			var select = '';
			data.forEach(function(element){
				console.log(element.nombreBanco);
				select += `<option value='${element['idBanco']}'>${element['nombreBanco']}</option>`;
			});
			document.getElementById('idBanco').innerHTML = select;
		});
	}
</script>
@endsection