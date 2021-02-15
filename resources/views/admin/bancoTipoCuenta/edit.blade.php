<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="edit{{$bancoTipoCuenta->idBancoTipoCuenta}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			{!! Form::open(['route' => ['mantenedor-banco-tipo-cuenta.update',$bancoTipoCuenta->idBancoTipoCuenta], 'method' => 'PUT']) !!}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Editar Asociación Cuenta Bancaria
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Nombre Tipo Cuenta</label>
                            {!! Form::select('idTipoCuenta', $tiposCuentas,$bancoTipoCuenta->idTipoCuenta,['class'=>"form-control",'placeholder'=>"Ingrese tipo cuenta",'required']) !!}

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Nombre Banco</label>
                            {!! Form::select('idBanco', $bancos,$bancoTipoCuenta->idBanco,['class'=>"form-control",'placeholder'=>"Ingrese banco",'required']) !!}

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
