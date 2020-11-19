
<button class="btn btn-primary" data-toggle="modal" data-target="#create">Agregar Provincia <i class="fas fa-plus"></i></button>

<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="create" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        {!!Form::open(['route' => 'mantenedor-provincias.store', 'method' => 'POST','files'=>true])!!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Nueva Provincia
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Nombre provincia</label>
                            {!!Form::text('nombreProvincia',null,['class'=>"form-control", 'placeholder'=>"Ingrese un nombre..." , 'required'])!!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Pais</label>
                            {!!Form::select('idPais',$paises,null,['class'=>"form-control", 'placeholder'=>"Seleccione un pais" , 'required','onchange'=>"sacarRegionPorPais(this.value)"])!!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Regiones</label>
                            {!!Form::select('idRegion',$regiones,null,['class'=>"form-control", 'placeholder'=>"Seleccione una región" , 'required','id'=>"select_regiones"])!!}
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
</script>
