@extends('layouts.public.app')
@section('title','Mis Datos')
<style type="text/css">
	.card{
		box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
	}
	.file{
		margin-top: 5rem;
	}
</style>
@section('content')
<br>
<div class="container">
	<div class="row">
		<br>
		<div class="col-lg-12" align="center"><h3>Mis datos de usuario</h3><br><br></div>
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-7" align="center"><h5>Ajustes de la cuenta</h5></div>
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
		{{--  
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
		</div>--}}
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
			<form action="{{ asset('dashboard/actualizacion-datos') }}" method="post">
				@csrf
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-12"><h5>Datos de identificación</h5><br></div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Nombre</label>
									<input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombre" value="{{ $usuario->nombre }}" disabled>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Apellido</label>
									<input type="text" name="apellido" class="form-control" placeholder="Ingrese Apellido" value="{{ $usuario->apellido }}" disabled>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Dirección de email</label>
									<input type="email" name="correo" class="form-control" placeholder="Ingrese Email" value="{{ $usuario->correo }}" disabled>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Teléfono</label>
									<div class="input-group mb-2">
	                                  <div class="input-group-prepend">
	                                    <div class="input-group-text">+56</div>
	                                  </div>
										<input type="number" name="numero" class="form-control" placeholder="Ingrese telefono" value="{{ $telefono->numero }}" disabled>
	                                </div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Fecha Nacimiento</label>
									@if ($usuario->fechaNacimiento != null)
										{!! Form::date('fechaNacimiento',date('Y-m-d',strtotime($usuario->fechaNacimiento)),['class'=>"form-control",'required','disabled']) !!}
									@else
										{!! Form::date('fechaNacimiento',null,['class'=>"form-control",'required']) !!}
									@endif
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Rut</label>
									<input type="text" name="rut" class="form-control" value="{{ $usuario->rut }}" disabled>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Sexo</label>
									@if ($usuario->idSexo != null)
										{!! Form::select('idSexo', $sexos,$usuario->idSexo,['class'=>"form-control",'placeholder'=>"Ingrese el sexo",'required','disabled']) !!}
									@else
										{!! Form::select('idSexo', $sexos,null,['class'=>"form-control",'placeholder'=>"Ingrese el sexo",'required']) !!}
									@endif
								</div>
							</div>
							<div class="col-lg-12">
								<hr>
							</div>
							<div class="col-lg-12"><br><h5>Residencia Fiscal</h5><br></div>
							<div class="col-lg-12">
								<div class="form-group">
									<label>Pais</label>
									@if (count($direccionUsuario)>0)
										{!! Form::select('idPais', $paises,$direccionUsuario->first()->idPais,['class'=>"form-control",'placeholder'=>"Ingrese el pais de residencia",'required','disabled']) !!}
									@else
										{!! Form::select('idPais', $paises,null,['class'=>"form-control",'placeholder'=>"Ingrese el pais de residencia",'required','id'=>"paises", 'onchange'=>"sacarRegionPorPais(this.value)"]) !!}
									@endif
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Región</label>
									@if (count($direccionUsuario)>0)
										{!! Form::select('idRegion', $regiones,$direccionUsuario->first()->idRegion,['class'=>"form-control",'placeholder'=>"Seleccione una region",'required','disabled']) !!}
									@else
										{!! Form::select('idRegion', $regiones,null,['class'=>"form-control",'placeholder'=>"Seleccione una region",'required','id'=>"select_regiones", 'onchange'=>"sacarProvinciaPorRegion(this.value)"]) !!}
									@endif
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Provincia</label>
									@if (count($direccionUsuario)>0)
										{!! Form::select('idProvincia', $provincias,$direccionUsuario->first()->idProvincia,['class'=>"form-control",'placeholder'=>"Seleccione una provincia",'required','disabled']) !!}
									@else
										{!! Form::select('idProvincia', $provincias,null,['class'=>"form-control",'placeholder'=>"Seleccione una provincia",'required','id'=>"select_provincias", 'onchange'=>"sacarComunaPorProvincia(this.value)"]) !!}
									@endif
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Comuna</label>
									@if (count($direccionUsuario)>0)
										{!! Form::select('idComuna', $comunas,$direccionUsuario->first()->idComuna,['class'=>"form-control",'placeholder'=>"Seleccione una comuna",'required','disabled']) !!}
									@else
										{!! Form::select('idComuna', $comunas,null,['class'=>"form-control",'placeholder'=>"Seleccione una comuna",'required','id'=>"select_comunas"]) !!}
									@endif

								</div>
							</div>
							
							<div class="col-lg-6">
								<div class="form-group">
									<label>Dirección</label>
									@if (count($direccionUsuario)>0)
										<input type="text" name="direccion1" class="form-control" disabled value="{{ $direccionUsuario->first()->direccion1 }}">									
									@else
										<input type="text" name="direccion1" class="form-control" required>
									@endif
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Numeración</label>
									@if (count($direccionUsuario)>0)
										<input type="number" name="direccion2" class="form-control" disabled value="{{ $direccionUsuario->first()->direccion2 }}">									
									@else
										<input type="number" name="direccion2" class="form-control" required>
									@endif
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<label>Código postal</label>
									@if (count($direccionUsuario)>0)
										<input type="number" name="codigoPostal" class="form-control" disabled value="{{ $direccionUsuario->first()->codigoPostal }}">
									@else
										<input type="number" name="codigoPostal" class="form-control" required>
									@endif
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
					</div>
					<div class="card-footer">
						<div class="row">
							<div class="col-lg-12" align="center">
								<button class="btn btn-primary" type="submit"><small>GUARDAR CAMBIOS</small></button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<br>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	const sacarRegionPorPais = (pais) => {
		$.get('{{ asset('regiones') }}/'+pais, (data, status) => {
			var regiones = "<option value=''>Seleccione una región</option>";
			data.forEach(region => {
				regiones += `<option value="${region['idRegion']}">${region['nombreRegion']}</option>`;
			});
			document.getElementById('select_regiones').innerHTML = regiones;
		});
	}
	const sacarProvinciaPorRegion = (region) => {
		$.get('{{ asset('provincias') }}/'+region, (data, status) => {
			var provincias = "<option value=''>Seleccione una provincia</option>";
			data.forEach(provincia => {
				provincias += `<option value="${provincia['idProvincia']}">${provincia['nombreProvincia']}</option>`;
			});
			document.getElementById('select_provincias').innerHTML = provincias;
		});
	}
	const sacarComunaPorProvincia = (provincia) =>{
		$.get('{{ asset('comunas') }}/'+provincia, (data, status) => {
			var comunas = "<option value=''>Seleccione una comuna</option>";
			data.forEach(comuna => {
				comunas += `<option value="${comuna['idComuna']}">${comuna['nombreComuna']}</option>`;
			});
			document.getElementById('select_comunas').innerHTML = comunas;
		});
	}
</script>
@endsection