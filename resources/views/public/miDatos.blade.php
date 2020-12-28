@extends('layouts.public.app')
<style type="text/css">
	.card{
		box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
	}
	.file{
		margin-top: 5rem;
	}
</style>
@section('title')
Documentos e Informes
@endsection
@section('content')
<br>
<div class="container">
	<div class="row">
		<br>
		<div class="col-lg-12" align="center"><h3>Mis datos de usuario</h3><br><br></div>
		<div class="col-lg-6">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12"><h5>Ajustes de la cuenta</h5></div>
						<div class="col-lg-6" align="center">
							<br>
							<img src="https://static.housers.com/assets/images/mis-datos/lock.svg">
						</div>
						<div class="col-lg-6" align="left">
							<br>
							<p><small>Cambia tu contraseña, tus preferencias de idioma,...</small></p>
						</div>
						<div class="col-lg-12">
							<br>
							<a href="{{ asset('dashboard/mis-datos/datos-adicionales') }}" class="btn btn-info" style="width: 100%"><small>CAMBIAR AJUSTES</small></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card" style="background-color: #13294A">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12"><h5 style="color: #fff;">Mis promociones</h5></div>
						<div class="col-lg-6" align="center">
							<br>
							<img src="https://static.housers.com/assets/images/mis-datos/promotion.svg">
						</div>
						<div class="col-lg-6" align="left">
							<br>
							<p style="color: #fff;"><small>Consulta y gestiona todas tus promociones</small></p>
						</div>
						<div class="col-lg-12">
							<br>
							<a href="{{ asset('dashboard/mis-datos/mis-promociones') }}" class="btn btn-info" style="width: 100%"><small>VER PROMOCIONES</small></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
	<div class="row">
		<div class="col-lg-12">
			<h4>Datos del inversor</h4>
		</div>
		<div class="col-lg-12">
		<br>
			<div class="card">
				<div class="card-body">
					<form>
						<div class="row">
							<div class="col-lg-12"><h5>Datos de identificación</h5><br></div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Nombre</label>
									<input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombre">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Apellido</label>
									<input type="text" name="apellido" class="form-control" placeholder="Ingrese Apellido">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Dirección de email</label>
									<input type="email" name="email" class="form-control" placeholder="Ingrese Email">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Teléfono</label>
									<input type="number" name="telefono" class="form-control" placeholder="Ingrese telefono">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Fecha Nacimiento</label>
									<input type="date" name="fechaNacimiento" class="form-control">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Nacionalidad</label>
									<select class="form-control">
										<option>Seleccione</option>
									</select>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Sexo</label>
									<select class="form-control">
										<option>Seleccione</option>
									</select>
								</div>
							</div>
							<div class="col-lg-12">
								<hr>
							</div>
							<div class="col-lg-12"><br><h5>Residencia Fiscal</h5><br></div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Pais</label>
									<select class="form-control">
										<option>Seleccione</option>
									</select>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Rut</label>
									<input type="text" name="rut" class="form-control">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<label>Dirección</label>
									<input type="text" name="direccion" class="form-control">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Código postal</label>
									<input type="number" name="codPostal" class="form-control">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Localidad</label>
									<input type="text" name="localidad" class="form-control">
								</div>
							</div>
							<div class="col-lg-12"><br></div>
							<div class="col-lg-12"><h5>Documento de identificación</h5></div>
							<div class="col-lg-12">
								<p><strong>PASAPORTE / DOCUMENTO DE IDENTIDAD.</strong> El documento de identificación debe estar en vigor, debe ser legible y debe estar el documento completo contenido en un mismo archivo. En el caso del documento nacional de identidad debes adjuntar ambas caras..</p>
							</div>
							<div class="col-lg-3">
								<label><strong>Tipo de Documento</strong></label>
								<select class="form-control">
									<option>Pasaporte</option>
								</select>
							</div>
							<div class="col-lg-2 file">
								<input type="file" class="form-control-file" >
							</div>
							<div class="col-lg-2 file">
								<input type="file" class="form-control-file" >
							</div>
							<div class="col-lg-2 file">
								<input type="file" class="form-control-file" >
							</div>
							<div class="col-lg-3 file">
								<input type="file" class="form-control-file" >
							</div>
							<div class="col-lg-3">
								<label><strong>Número Documento</strong></label>
								<input type="number" name="" class="form-control">
							</div>
							<div class="col-lg-12">
							<br>
							<br>
								<p><strong>Otro documento de identificación</strong></p>
								<hr>
							</div>
							<div class="col-lg-12">
								<p>Adjunta un segundo documento de identidad por ambas caras en vigor, legible y en color.</p>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<br>
</div>
@endsection