<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="edit{{$banco->idBanco}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			{!! Form::open(['route' => ['mantenedor-banco.update',$banco->idBanco], 'method' => 'PUT']) !!}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Editar Banco
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Nombre Banco</label>
                            {!! Form::text('nombreBanco',$banco->nombreBanco,['class'=>"form-control",'placeholder'=>"Ingrese nombre del banco",'required']) !!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Pais</label>
                            {!! Form::select('idPais', $paises,$banco->idPais,['class'=>"form-control",'placeholder'=>"Ingrese pais",'required']) !!}
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
