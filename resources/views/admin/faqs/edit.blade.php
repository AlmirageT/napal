<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="edit{{$faq->idFaq}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			{!! Form::open(['route' => ['mantenedor-faqs.update',$faq->idFaq], 'method' => 'PUT']) !!}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Editar Tipo Usuario
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Titulo nuevo faq</label>
                            {!!Form::text('tituloFaq',$faq->tituloFaq,['class'=>"form-control", 'placeholder'=>"Ingrese un titulo..." , 'required'])!!}
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">SubTitulo nuevo faq</label>
                            {!!Form::text('subTituloFaq',$faq->subTituloFaq,['class'=>"form-control", 'placeholder'=>"Ingrese un sub-titulo..." , 'required'])!!}
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">URL</label>
                            {!!Form::text('url',$faq->url,['class'=>"form-control", 'placeholder'=>"Ingrese una url..."])!!}
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Tipo faq</label>
                            {!!Form::select('idTipoFaq', $tiposFaqs,$faq->idTipoFaq,['class'=>"form-control", 'placeholder'=>"Seleccione un tipo"])!!}
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
