<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="edit{{$parametroGeneral->idParametroGeneral}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			{!! Form::open(['route' => ['mantenedor-parametros-generales.update',$parametroGeneral->idParametroGeneral], 'method' => 'PUT']) !!}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Editar Estado
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    x
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Nombre parametro general</label>
                            {!!Form::text('nombreParametroGeneral',$parametroGeneral->nombreParametroGeneral,['class'=>"form-control", 'placeholder'=>"Ingrese un nombre..." , 'required'])!!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Valor parametro general</label>
                            {!!Form::text('valorParametroGeneral',$parametroGeneral->valorParametroGeneral,['class'=>"form-control", 'placeholder'=>"Ingrese un valor..." , 'required'])!!}

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
