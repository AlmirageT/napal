@extends('layouts.public.app')
@section('title','Ajuste de Cuenta')
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
				<form action="{{ asset('dashboard/actualizar-contrasena') }}" method="post">
					@csrf
					<div class="card-body">
						<div class="row">
							<div class="col-lg-12">
								<p>Puedes cambiar tu contraseña completando el siguiente formulario:</p>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Contraseña Actual</label>
									<input type="password" name="passwordActual" class="form-control" required>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Nueva Contraseña</label>
									<input type="password" name="passwordNueva" class="form-control" required id="passwordNueva">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Repite Contraseña</label>
									<input type="password" name="passwordRepite" class="form-control" required id="passwordRepite" onchange="revisarContrasena()">
								</div>
							</div>
							<div class="col-lg-12" align="right">
								<button class="btn btn-info"><small>GUARDAR CAMBIOS</small></button>
							</div>
						</div>
					</div>
				</form>
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
				<form method="post" action="{{ asset('dashboard/actualizacion-datos-personales') }}">
					@csrf
					<div class="card-body">
						<div class="row">
							<div class="col-lg-12">
								<p>DATOS ADICIONALES</p>
								<hr>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Sexo</label>
									@if ($usuario->idSexo)
										{!! Form::select('idSexo', $sexos,$usuario->idSexo,['class'=>"form-control",'placeholder'=>"Seleccione un sexo",'required']) !!}
									@else
										{!! Form::select('idSexo', $sexos,null,['class'=>"form-control",'placeholder'=>"Seleccione un sexo",'required']) !!}
									@endif
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Idioma</label>
									@if ($usuario->idIdioma)
										{!! Form::select('idIdioma', $idiomas,$usuario->idIdioma,['class'=>"form-control",'placeholder'=>"Seleccione un idioma",'required']) !!}
									@else
										{!! Form::select('idIdioma', $idiomas,null,['class'=>"form-control",'placeholder'=>"Seleccione un idioma",'required']) !!}
									@endif
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Profesión</label>
									@if ($usuario->profesion)
										<input type="text" name="profesion" class="form-control" value="{{ $usuario->profesion }}">
									@else	
										<input type="text" name="profesion" class="form-control">
									@endif
								</div>
							</div>
							<div class="col-lg-5">
								<div class="form-group">
									<label>Estado Civil</label>
									@if ($usuario->idEstadoCivil)
										{!! Form::select('idEstadoCivil', $estadosCiviles,$usuario->idEstadoCivil,['class'=>"form-control",'placeholder'=>"Seleccione un estado civil",'required']) !!}
									@else
										{!! Form::select('idEstadoCivil', $estadosCiviles,null,['class'=>"form-control",'placeholder'=>"Seleccione un estado civil",'required']) !!}
									@endif
								</div>
							</div>
							<div class="col-lg-12" align="right">
								<button class="btn btn-info"><small>ACEPTAR Y CONTINUAR</small></button>
							</div>
						</div>
					</div>
				</form>
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
<script type="text/javascript">
	function revisarContrasena() {
		var pass = document.getElementById('passwordNueva').value;
		var pass2 = document.getElementById('passwordRepite').value;
		if(pass.trim()  != pass2.trim()){
			document.getElementById('passwordNueva').value = '';
			document.getElementById('passwordRepite').value = '';
			alert("Las contraseñas no son iguales");
		}
	}
</script>