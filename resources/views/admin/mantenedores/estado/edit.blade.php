<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="edit{{$estado->idEstado}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			{!! Form::open(['route' => ['mantenedor-estados.update',$estado->idEstado], 'method' => 'PUT']) !!}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Editar Estado
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Nombre estado</label>
                            {!!Form::text('nombreEstado',$estado->nombreEstado,['class'=>"form-control", 'placeholder'=>"Ingrese un nombre..." , 'required'])!!}
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Tipo estado</label>
                            {!! Form::select('idTipoEstado', $tiposEstados,$estado->idTipoEstado,['class'=>"form-control",'placeholder'=>"Ingrese el tipo estado",'required']) !!}
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
