@extends('layouts.admin.app')
@section('title')
Actualizar Proyecto
@endsection
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<div align="center">
				<h3>Actualizar Proyecto</h3>
			</div>
		</div>
        {!!Form::open(['route' => ['mantenedor-proyectos.update',$proyecto->idProyecto], 'method' => 'PUT','files'=>true])!!}
        	@csrf
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label>Nombre</label>
								{!!Form::text('nombreProyecto',$proyecto->nombreProyecto,['class'=>"form-control", 'placeholder'=>"Ingrese nombre del proyecto" , 'required'])!!}
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label>Foto Portada</label>
								<input type="file" name="fotoPortada" class="form-control" onchange="onFileSelected(event)">
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<img id="myimage" height="200" src="{{ asset($proyecto->fotoPortada) }}">
							</div>					
						</div>
						<div class="col-12">
							<div class="form-group">
								<label>Pais</label>
								{!! Form::select('idPais', $paises,$proyecto->idPais,['class'=>"form-control",'placeholder'=>"Seleccione pais",'required','id'=>"paises", 'onchange'=>"sacarRegionPorPais(this.value)"]) !!}
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label>Región</label>
								{!! Form::select('idRegion', $regiones,$proyecto->idRegion,['class'=>"form-control",'placeholder'=>"Seleccione una region",'required','id'=>"select_regiones", 'onchange'=>"sacarProvinciaPorRegion(this.value)"]) !!}
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label>Provincia</label>
								{!! Form::select('idProvincia', $provincias,$proyecto->idProvincia,['class'=>"form-control",'placeholder'=>"Seleccione una provincia",'required','id'=>"select_provincias", 'onchange'=>"sacarComunaPorProvincia(this.value)"]) !!}
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label>Comuna</label>
								{!! Form::select('idComuna', $comunas,$proyecto->idComuna,['class'=>"form-control",'placeholder'=>"Seleccione una comuna",'required','id'=>"select_comunas"]) !!}

							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label>Dirección</label>
								{!! Form::text('direccion',$proyecto->direccion,['class'=>"form-control",'placeholder'=>"Ingrese la dirección",'required','id'=>"txtDireccion"]) !!}
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label>Número</label>
								{!! Form::text('numeracionProyecto',$proyecto->numeracionProyecto,['class'=>"form-control",'placeholder'=>"Ingrese numeración de su casa",'required','id'=>"txtNumero"]) !!}
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label>Código postal</label>
								{!! Form::text('codigoPostal',$proyecto->codigoPostal,['class'=>"form-control",'placeholder'=>"Ingrese el código postal",'required']) !!}
							</div>
						</div>
						<div class="col-12">
							<div id="map" style="width: 100%; height: 300px"></div>
							<br>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Latitud</label>
								{!! Form::text('latitud',$proyecto->latitud,['class'=>"form-control",'required','id'=>"latitud"]) !!}
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Longitud</label>
								{!! Form::text('longitud',$proyecto->longitud,['class'=>"form-control",'required','id'=>"longitud"]) !!}
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					{!! Form::submit('Actualizar Proyecto',['class'=>"btn btn-primary btn-block"]) !!}
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

