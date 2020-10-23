@extends('layouts.admin.app')
@section('title')
Crear Propiedad
@endsection

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<div align="center">
				<h3>Crear Propiedad</h3>
			</div>
		</div>
        {!!Form::open(['route' => 'mantenedor-propiedades.store', 'method' => 'POST','files'=>true])!!}
        	@csrf
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label>Nombre Propiedad</label>
								{!!Form::text('nombrePropiedad',null,['class'=>"form-control", 'placeholder'=>"Ingrese nombre de la propiedad" , 'required'])!!}
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label>Foto Propiedad Portada</label>
								<input type="file" required name="fotoPrincipal" class="form-control" onchange="onFileSelected(event)">
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<img id="myimage" height="200">
							</div>					
						</div>
						<div class="col-12">
							<div class="form-group">
								<label>Pais</label>
								{!! Form::select('idPais', $paises,null,['class'=>"form-control",'placeholder'=>"Seleccione pais",'required','id'=>"paises", 'onchange'=>"sacarRegionPorPais(this.value)"]) !!}
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label>Región</label>
								{!! Form::select('idRegion', $regiones,null,['class'=>"form-control",'placeholder'=>"Seleccione una region",'required','id'=>"select_regiones", 'onchange'=>"sacarProvinciaPorRegion(this.value)"]) !!}
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label>Provincia</label>
								{!! Form::select('idProvincia', $provincias,null,['class'=>"form-control",'placeholder'=>"Seleccione una provincia",'required','id'=>"select_provincias", 'onchange'=>"sacarComunaPorProvincia(this.value)"]) !!}
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label>Comuna</label>
								{!! Form::select('idComuna', $comunas,null,['class'=>"form-control",'placeholder'=>"Seleccione una comuna",'required','id'=>"select_comunas"]) !!}

							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label>Dirección</label>
								{!! Form::text('direccion1',null,['class'=>"form-control",'placeholder'=>"Ingrese la dirección",'required','id'=>"txtDireccion"]) !!}
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label>Número</label>
								{!! Form::text('direccion2',null,['class'=>"form-control",'placeholder'=>"Ingrese numeración de su casa",'required','id'=>"txtNumero"]) !!}
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label>Código postal</label>
								{!! Form::text('codigoPostal',null,['class'=>"form-control",'placeholder'=>"Ingrese el código postal",'required']) !!}
							</div>
						</div>
						<div class="col-12">
							<div id="map" style="width: 100%; height: 300px"></div>
							<br>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Latitud</label>
								{!! Form::text('latitud',null,['class'=>"form-control",'required','id'=>"latitud"]) !!}
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Longitud</label>
								{!! Form::text('longitud',null,['class'=>"form-control",'required','id'=>"longitud"]) !!}
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Tipo Invesión</label>
								{!! Form::select('idTipoInversion', $tipo_inversion,null,['class'=>"form-control js-example-basic-multiple",'placeholder'=>"Seleccione un tipo de inversion"]) !!}
							</div>
						</div>
						
						<div class="col-6">
							<div class="form-group">
								<label>Proyecto Asociado</label>
								{!! Form::select('idProyecto', $proyecto,null,['class'=>"form-control js-example-basic-multiple",'placeholder'=>"Seleccione el proyecto asociado"]) !!}

							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label>Tipo Flexibilidad</label>
								{!! Form::select('idTipoFlexibilidad', $tipo_flexibilidad,null,['class'=>"form-control",'placeholder'=>"Seleccione un tipo de flexibilidad"]) !!}
							</div>
						</div>
						
						<div class="col-4">
							<div class="form-group">
								<label>Tiene Chat</label>
								<br>
								<input type="checkbox" id="switch4" switch="success" checked name="tieneChat" />
                                <label for="switch4" data-on-label="Si"
                                        data-off-label="No"></label>
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label>Tipo Calidad</label>
								{!! Form::select('idTipoCalidad', $tipo_calidad,null,['class'=>"form-control",'placeholder'=>"Seleccione un tipo de calidad"]) !!}
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label>Tipo de Credito</label>
								{!! Form::select('idTipoCredito', $tipo_credito,null,['class'=>"form-control js-example-basic-multiple",'placeholder'=>"Seleccione un tipo de credito"]) !!}
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label>Precio</label>
								{!! Form::text('precio',null,['class'=>"form-control",'required']) !!}
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label>Moneda</label>
								{!! Form::select('idMoneda', $monedas,null,['class'=>"form-control js-example-basic-multiple",'placeholder'=>"Seleccione una moneda"]) !!}
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label>Plazo Meses</label>
								{!! Form::number('plazoMeses',null,['class'=>"form-control",'required']) !!}
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Fecha Inicio</label>
								{!! Form::date('fechaInicio',null,['class'=>"form-control",'required']) !!}
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Fecha Finalización</label>
								{!! Form::date('fechaFinalizacion',null,['class'=>"form-control",'required']) !!}
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Rentabilidad Anual</label>
								{!! Form::text('rentabilidadAnual',null,['class'=>"form-control",'required']) !!}
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Rentabilidad Total</label>
								{!! Form::text('rentabilidadTotal',null,['class'=>"form-control",'required']) !!}
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Estado</label>
								{!! Form::select('idEstado', $estados,null,['class'=>"form-control",'placeholder'=>"Seleccione un estado de la propiedad"]) !!}
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Usuario</label>
								{!! Form::select('idUsuario', $usuarios,null,['class'=>"form-control js-example-basic-multiple",'placeholder'=>"Seleccione un usuario",'required']) !!}
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label>Descripción</label>
								<textarea class="form-control summernote" name="descripcion" ></textarea>
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label>m2 Construidos</label>
								{!! Form::number('mConstruido',null,['class'=>"form-control",'required']) !!}
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label>m2 Superficie</label>
								{!! Form::number('mSuperficie',null,['class'=>"form-control",'required']) !!}
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label>m2 Terraza</label>
								{!! Form::number('mTerraza',null,['class'=>"form-control",'required']) !!}
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label>Cantidad de SubPropiedades</label>
								{!! Form::number('cantidadSubPropiedad',null,['class'=>"form-control",'required']) !!}
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label>Habitaciones</label>
								{!! Form::number('habitaciones',null,['class'=>"form-control",'required']) !!}
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label>Baños</label>
								{!! Form::number('baños',null,['class'=>"form-control",'required']) !!}

							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label>Notas Internas</label>
								<textarea class="form-control summernote" name="notasInternas"></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					{!! Form::submit('Agregar Propiedad',['class'=>"btn btn-primary btn-block"]) !!}
				</div>
        {!!Form::close()!!}
	</div>
</div>
@endsection
@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9BKzI4HVxT1mjnxQIHx_8va7FBvROI6g&callback=initMap" async defer></script>
<script src="{{ asset('assets/js/pages/maps.js') }}"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('.summernote').summernote({
        height: 200
    });
    $(document).ready(function(){
    	$('.js-example-basic-multiple').select2({});
    });

</script>
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

