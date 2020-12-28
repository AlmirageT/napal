<button class="btn btn-primary" data-toggle="modal" data-target="#create">Agregar Banco <i class="fas fa-plus"></i></button>

<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="create" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        {!!Form::open(['route' => 'mantenedor-banco.store', 'method' => 'POST','files'=>true])!!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Nuevo Banco
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Nombre Banco</label>
                            {!! Form::text('nombreBanco',null,['class'=>"form-control",'placeholder'=>"Ingrese nombre del banco",'required']) !!}

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Pais</label>
                            {!! Form::select('idPais', $paises,null,['class'=>"form-control",'placeholder'=>"Ingrese pais",'required']) !!}
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
