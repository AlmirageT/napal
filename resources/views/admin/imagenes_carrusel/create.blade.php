<button class="btn btn-primary" data-toggle="modal" data-target="#create">Agregar Imagen <i class="fas fa-plus"></i></button>

<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="create" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        {!!Form::open(['route' => 'mantenedor-carrusel.store', 'method' => 'POST','files'=>true])!!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Nueva Imagen
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Foto Carrusel</label>
                            <input type="file" name="rutaImagenCarrusel" class="form-control" required onchange="onFileSelected(event)">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <img id="myimage" height="200">
                        </div>                  
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Activo</label>
                            <br>
                            <input type="checkbox" id="switch4" switch="success" checked name="activoImagenCarrusel" />
                            <label for="switch4" data-on-label="Si"
                                    data-off-label="No"></label>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="form-group">
                            <label>Tipo Imagen</label>
                            {!! Form::select('idTipoImagen', $tiposImagenes,null,['class'=>"form-control",'placeholder'=>"Seleccione un tipo de imagen",'required']) !!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Titulo</label>
                            {!! Form::text('tituloImagenCarrusel',null,['class'=>"form-control",'placeholder'=>"Titulo"]) !!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>SubTitulo</label>
                            {!! Form::text('subTituloImagenCarrusel',null,['class'=>"form-control",'placeholder'=>"SubTitulo"]) !!}
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