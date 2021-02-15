<button class="btn btn-primary" data-toggle="modal" data-target="#create">Agregar Asociación banco - tipo cuenta <i class="fas fa-plus"></i></button>

<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="create" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        {!!Form::open(['route' => 'mantenedor-banco-tipo-cuenta.store', 'method' => 'POST','files'=>true])!!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Nuevo Tipo Cuenta
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Nombre Tipo Cuenta</label>
                            {!! Form::select('idTipoCuenta', $tiposCuentas,null,['class'=>"form-control",'placeholder'=>"Ingrese tipo cuenta",'required']) !!}

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Nombre Banco</label>
                            {!! Form::select('idBanco', $bancos,null,['class'=>"form-control",'placeholder'=>"Ingrese banco",'required']) !!}

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
