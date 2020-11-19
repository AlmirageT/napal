<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="edit{{$imagenCarrusel->idImagenCarrusel}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			{!! Form::open(['route' => ['mantenedor-carrusel.update',$imagenCarrusel->idImagenCarrusel], 'method' => 'PUT','files'=>true]) !!}
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
                            <label>Foto Carrusel</label>
                            <input type="file" name="rutaImagenCarrusel" class="form-control" onchange="FileSelected(event)">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <img id="myimage_edit" src="{{ asset($imagenCarrusel->rutaImagenCarrusel) }}" height="200">
                        </div>                  
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Activo</label>
                            <br>
                            @if($imagenCarrusel->activoImagenCarrusel == 1)
                                <input type="checkbox" id="switch4" switch="success" checked name="activoImagenCarrusel" />
                                <label for="switch4" data-on-label="Si"
                                        data-off-label="No"></label>
                            @else
                                <input type="checkbox" id="switch4" switch="success" name="activoImagenCarrusel" />
                                <label for="switch4" data-on-label="Si"
                                        data-off-label="No"></label>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="form-group">
                            <label>Tipo Imagen</label>
                            {!! Form::select('idTipoImagen', $tiposImagenes,$imagenCarrusel->idTipoImagen,['class'=>"form-control",'placeholder'=>"Seleccione un tipo de imagen",'required']) !!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Titulo</label>
                            {!! Form::text('tituloImagenCarrusel',$imagenCarrusel->tituloImagenCarrusel,['class'=>"form-control",'placeholder'=>"Titulo"]) !!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>SubTitulo</label>
                            {!! Form::text('subTituloImagenCarrusel',$imagenCarrusel->subTituloImagenCarrusel,['class'=>"form-control",'placeholder'=>"SubTitulo"]) !!}
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
    function FileSelected(event) {
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