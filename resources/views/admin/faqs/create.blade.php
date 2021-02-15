<button class="btn btn-primary" data-toggle="modal" data-target="#create">Agregar Faq <i class="fas fa-plus"></i></button>

<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="create" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        {!!Form::open(['route' => 'mantenedor-faqs.store', 'method' => 'POST'])!!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Nuevo Faq
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Titulo nuevo faq</label>
                            {!!Form::text('tituloFaq',null,['class'=>"form-control", 'placeholder'=>"Ingrese un titulo..." , 'required'])!!}
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">SubTitulo nuevo faq</label>
                            {!!Form::text('subTituloFaq',null,['class'=>"form-control", 'placeholder'=>"Ingrese un sub-titulo..." , 'required'])!!}
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">URL</label>
                            {!!Form::text('url',null,['class'=>"form-control", 'placeholder'=>"Ingrese una url..."])!!}
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Tipo faq</label>
                            {!!Form::select('idTipoFaq', $tiposFaqs,null,['class'=>"form-control", 'placeholder'=>"Seleccione un tipo"])!!}
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
