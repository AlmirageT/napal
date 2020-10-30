<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="edit{{$casoExitoso->idCasoExitoso}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			{!! Form::open(['route' => ['mantenedor-casos-exitosos.update',$casoExitoso->idCasoExitoso], 'method' => 'PUT']) !!}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Editar Caso Exitoso
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Propiedades</label>
                            {!! Form::select('idPropiedad', $propiedades,$casoExitoso->idPropiedad,['class'=>"form-control js-example-basic-multiple",'placeholder'=>"Ingrese la propiedad",'required']) !!}
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
    $(document).ready(function(){
        $('.js-example-basic-multiple').select2({});
    });
</script>