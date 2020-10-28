
<button class="btn btn-primary" data-toggle="modal" data-target="#create">Agregar Región <i class="fas fa-plus"></i></button>

<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="create" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        {!!Form::open(['route' => 'mantenedor-regiones.store', 'method' => 'POST'])!!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Nueva Región
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Nombre región</label>
                            {!!Form::text('nombreRegion',null,['class'=>"form-control", 'placeholder'=>"Ingrese un nombre..." , 'required'])!!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Ordinal Región</label>
                            {!!Form::text('ordinalRegion',null,['class'=>"form-control", 'placeholder'=>"Ingrese el ordinal de la región..." ])!!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Pais</label>
                            {!!Form::select('idPais',$paises,null,['class'=>"form-control", 'placeholder'=>"Ingrese un pais..." ])!!}
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
</script>
