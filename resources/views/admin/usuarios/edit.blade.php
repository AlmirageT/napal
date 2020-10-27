@extends('layouts.admin.app')
@section('title')
Crear Usuario
@endsection
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<div align="center">
				<h3>Actualizar Usuario</h3>
			</div>
		</div>
        {!!Form::open(['route' =>  ['mantenedor-usuarios.update',$usuario->idUsuario], 'method' => 'PUT','files'=>true])!!}
        	@csrf
				<div class="card-body">
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label>Nombre</label>
								{!!Form::text('nombre',$usuario->nombre,['class'=>"form-control", 'placeholder'=>"Ingrese sus nombres" , 'required'])!!}
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Apellidos</label>
								{!! Form::text('apellido',$usuario->apellido,['class'=>"form-control", 'placeholder'=>"Ingrese sus apellidos", 'required']) !!}
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Correo</label>
								{!! Form::email('correo',$usuario->correo,['class'=>"form-control", 'placeholder'=>"ejemplo@ejemplo.com", 'required']) !!}
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Rut</label>
								{!! Form::text('rut',$usuario->rut,['class'=>"form-control",'placeholder'=>"Ingrese su rut sin puntos ni guiones",'required','onchange'=>"formateaRut(this.value)", 'id'=>"rut"]) !!}
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Contraseña</label>
								<input type="password" name="password" class="form-control" placeholder="*********" required>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Confirmar Contraseña</label>
								<input type="password" name="confirm_password" class="form-control" placeholder="*********" required>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<label>Foto Perfil</label>
								<input type="file" name="avatar" class="form-control" onchange="onFileSelected(event)">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<img id="myimage" src="{{ asset($avatar->rutaAvatar) }}" height="200">
							</div>					
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<label>Profesión</label>
								{!! Form::text('profesion',$usuario->profesion,['class'=>"form-control",'placeholder'=>"Ingrese la profesión",'required']) !!}
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<label>Pais</label>
								{!! Form::select('idPais', $paises,$direccion_usuario->idPais,['class'=>"form-control",'placeholder'=>"Ingrese el pais de residencia",'required','id'=>"paises", 'onchange'=>"sacarRegionPorPais(this.value)"]) !!}
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Región</label>
								{!! Form::select('idRegion', $regiones,$direccion_usuario->idRegion,['class'=>"form-control",'placeholder'=>"Seleccione una region",'required','id'=>"select_regiones", 'onchange'=>"sacarProvinciaPorRegion(this.value)"]) !!}
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Provincia</label>
								{!! Form::select('idProvincia', $provincias,$direccion_usuario->idProvincia,['class'=>"form-control",'placeholder'=>"Seleccione una provincia",'required','id'=>"select_provincias", 'onchange'=>"sacarComunaPorProvincia(this.value)"]) !!}
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Comuna</label>
								{!! Form::select('idComuna', $comunas,$direccion_usuario->idComuna,['class'=>"form-control",'placeholder'=>"Seleccione una comuna",'required','id'=>"select_comunas"]) !!}

							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Dirección 1</label>
								{!! Form::text('direccion1',$direccion_usuario->direccion1,['class'=>"form-control",'placeholder'=>"Ingrese la dirección",'required','id'=>"txtDireccion"]) !!}
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Número</label>
								{!! Form::text('direccion2',$direccion_usuario->direccion2,['class'=>"form-control",'placeholder'=>"Ingrese numeración de su casa",'required','id'=>"txtNumero"]) !!}
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Código postal</label>
								{!! Form::text('codigoPostal',$direccion_usuario->codigoPostal,['class'=>"form-control",'placeholder'=>"Ingrese el código postal",'required']) !!}
							</div>
						</div>
						<div class="col-lg-12">
							<div id="map" style="width: 100%; height: 300px"></div>
							<br>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Latitud</label>
								{!! Form::text('latitud',$direccion_usuario->latitud,['class'=>"form-control",'required','id'=>"latitud"]) !!}
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Longitud</label>
								{!! Form::text('longitud',$direccion_usuario->longitud,['class'=>"form-control",'required','id'=>"longitud"]) !!}
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Idioma</label>
								{!! Form::select('idIdioma', $idiomas,$usuario->idIdioma,['class'=>"form-control",'placeholder'=>"Ingrese el idioma",'required']) !!}
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Tipo Persona</label>
								{!! Form::select('idTipoPersona', $tipos_personas,$usuario->idTipoPersona,['class'=>"form-control",'placeholder'=>"Ingrese tipo persona",'required']) !!}
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Tipo Usuario</label>
								{!! Form::select('idTipoUsuario', $tipos_usuarios,$usuario->idTipoUsuario,['class'=>"form-control",'placeholder'=>"Ingrese tipo usuario",'required']) !!}
								
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					{!! Form::submit('Actualizar Usuario',['class'=>"btn btn-primary btn-block",'ali']) !!}
				</div>
        {!!Form::close()!!}
	</div>
</div>
@endsection
@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9BKzI4HVxT1mjnxQIHx_8va7FBvROI6g&callback=initMap" async defer></script>
<script src="{{ asset('assets/js/pages/maps.js') }}"></script>
@endsection
<script>
	function onFileSelected(event) {
	  var selectedFile = event.target.files[0];
	  var reader = new FileReader();

	  var imgtag = document.getElementById("myimage");
	  imgtag.title = selectedFile.name;

	  reader.onload = function(event) {
	    imgtag.src = event.target.result;
	  };

	  reader.readAsDataURL(selectedFile);
	}
	function formateaRut(rut) {
	    var actual = rut.replace(/^0+/, "");
	    if (actual != '' && actual.length > 1) {
	        var sinPuntos = actual.replace(/\./g, "");
	        var actualLimpio = sinPuntos.replace(/-/g, "");
	        var inicio = actualLimpio.substring(0, actualLimpio.length - 1);
	        var rutPuntos = "";
	        var i = 0;
	        var j = 1;
	        for (i = inicio.length - 1; i >= 0; i--) {
	            var letra = inicio.charAt(i);
	            rutPuntos = letra + rutPuntos;
	            if (j % 3 == 0 && j <= inicio.length - 1) {
	                rutPuntos = "." + rutPuntos;
	            }
	            j++;
	        }
	        var dv = actualLimpio.substring(actualLimpio.length - 1);
	        rutPuntos = rutPuntos + "-" + dv;
	    }
	    document.getElementById('rut').value = rutPuntos;
	}
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

