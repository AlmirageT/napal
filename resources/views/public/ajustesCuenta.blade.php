@extends('layouts.public.app')
<style type="text/css">
	.card{
		box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
	}
</style>
@section('content')
<br>
<div class="container">
	<div class="row">
		<div class="col-lg-12" align="center">
			<h4>Ajustes de la cuenta</h4>
			<br>
			<br>
		</div>
		<div class="col-lg-12">
			<h5>CAMBIAR CONTRASEÑA</h5>
			<br>
		</div>
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12">
							<p>Puedes cambiar tu contraseña completando el siguiente formulario:</p>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Contraseña Actual</label>
								<input type="password" name="passwordActual" class="form-control">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Nueva Contraseña</label>
								<input type="password" name="passwordNueva" class="form-control">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Repite Contraseña</label>
								<input type="password" name="passwordRepite" class="form-control">
							</div>
						</div>
						<div class="col-lg-12" align="right">
							<button class="btn btn-info"><small>GUARDAR CAMBIOS</small></button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-12">
			<br>
			<br>
			<h5>DATOS ADICIONALES</h5>
			<br>
		</div>
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12">
							<p>DATOS ADICIONALES</p>
							<hr>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Sexo</label>
								<select class="form-control">
									<option>Seleccione</option>
								</select>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Idioma</label>
								<select class="form-control">
									<option>Seleccione</option>
								</select>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Sexo</label>
								<input type="text" name="profesion" class="form-control">
							</div>
						</div>
						<div class="col-lg-5">
							<div class="form-group">
								<label>Estado Civil</label>
								<select class="form-control">
									<option>Seleccione</option>
								</select>
							</div>
						</div>
						<div class="col-lg-12" align="right">
							<button class="btn btn-info"><small>ACEPTAR Y CONTINUAR</small></button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-12"><h5><br><br>NEWSLETTERS COMERCIALES</h5><br></div>
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="form-check">
							    <input type="checkbox" class="form-check-input" id="exampleCheck1">
							    <label class="" for="exampleCheck1">Si quieres darte de baja de nuestra newsletter, desmarca la casilla. Si quieres volver a darte de alta, vuelve a marcarla.</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
</div>
@endsection