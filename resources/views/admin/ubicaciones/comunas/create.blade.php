
<button class="btn btn-primary" data-toggle="modal" data-target="#create">Agregar Comuna <i class="fas fa-plus"></i></button>

<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="create" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        {!!Form::open(['route' => 'mantenedor-comunas.store', 'method' => 'POST','files'=>true])!!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Nueva Comuna
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Nombre Comuna</label>
                            {!!Form::text('nombreComuna',null,['class'=>"form-control", 'placeholder'=>"Ingrese un nombre..." , 'required'])!!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Pais</label>
                            {!! Form::select('idPais', $paises,null,['class'=>"form-control",'placeholder'=>"Ingrese el pais de residencia",'required','id'=>"paises", 'onchange'=>"sacarRegionPorPais(this.value)"]) !!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Región</label>
                            {!! Form::select('idRegion', $regiones,null,['class'=>"form-control",'placeholder'=>"Seleccione una region",'required','id'=>"select_regiones", 'onchange'=>"sacarProvinciaPorRegion(this.value)"]) !!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Provincia</label>
                            {!! Form::select('idProvincia', $provincias,null,['class'=>"form-control",'placeholder'=>"Seleccione una provincia",'required','id'=>"select_provincias"]) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal" type="button">
                    Cerrar
                </button>
                <button class="btn btn-primary">
                    Registrar
                </button>
            </div>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<script>
	function selectFile(event) {
	  var selectedFile = event.target.files[0];
	  var reader = new FileReader();

	  var imgtag = document.getElementById("myimage_create");
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
</script>
