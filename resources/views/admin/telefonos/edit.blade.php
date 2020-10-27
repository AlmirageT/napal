<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="edit{{$telefono->idTelefono}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			{!! Form::open(['route' => ['mantenedor-telefonos.update',$telefono->idTelefono], 'method' => 'PUT']) !!}
                    <input type="hidden" name="idUsuario" value="{{ $idUsuario }}">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Editar Télefono
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Número</label>
                            {!!Form::number('numero',$telefono->numero,['class'=>"form-control", 'placeholder'=>"9 87654321" , 'required'])!!}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Tipo Télefono</label>
                            {!!Form::select('idTipoTelefono',$tipos_telefonos,$telefono->idTipoTelefono,['class'=>"form-control", 'placeholder'=>"Ingrese el tipo de télefono" , 'required'])!!}
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
