<button class="btn btn-primary" data-toggle="modal" data-target="#create">Agregar Caso Exitoso <i class="fas fa-plus"></i></button>

<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="create" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        {!!Form::open(['route' => 'mantenedor-casos-exitosos.store', 'method' => 'POST','files'=>true])!!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Nuevo Caso Exitoso
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Propiedades</label>
                            {!! Form::select('idPropiedad', $propiedades,null,['class'=>"form-control js-example-basic-multiple",'placeholder'=>"Ingrese la propiedad",'required']) !!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Foto Perfil</label>
                            <input type="file" name="imagenCasoExito" class="form-control" required onchange="onFileSelected(event)" size="102400" id="imagen">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <img id="myimage" height="200">
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
<script type="text/javascript">
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
</script>
