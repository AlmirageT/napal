<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="edit{{$provincia->idProvincia}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			{!! Form::open(['route' => ['mantenedor-provincias.update',$provincia->idProvincia], 'method' => 'PUT','files'=>true]) !!}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Editar Estado
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Nombre provincia</label>
                            {!!Form::text('nombreProvincia',$provincia->nombreProvincia,['class'=>"form-control", 'placeholder'=>"Ingrese un nombre..." , 'required'])!!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Pais</label>
                            {!!Form::select('idPais',$paises,$provincia->idPais,['class'=>"form-control", 'placeholder'=>"Seleccione un pais" , 'required','onchange'=>"sacarRegionPorPais(this.value)"])!!}
                        </div>
                    </div> 
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Regiones</label>
                            {!!Form::select('idRegion',$regiones,$provincia->idRegion,['class'=>"form-control", 'placeholder'=>"Seleccione una region" , 'required'])!!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal" type="button">
                    Cerrar
                </button>
                <button class="btn btn-primary">
                    Actualizar
                </button>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
</div>
<script>
    function onFileSelected(event) {
      var selectedFile = event.target.files[0];
      var reader = new FileReader();

      var imgtag = document.getElementById("myimage_edit");
      imgtag.title = selectedFile.name;

      reader.onload = function(event) {
        imgtag.src = event.target.result;
      };

      reader.readAsDataURL(selectedFile);
    }
</script>
