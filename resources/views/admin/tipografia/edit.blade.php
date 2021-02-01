<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="edit{{$tipografia->idTipografia}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			{!! Form::open(['route' => ['mantenedor-tipografia.update',$tipografia->idTipografia], 'method' => 'PUT']) !!}
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
                            <label for="">Nombre General</label>
                            {!! Form::text('nombreGeneral',$tipografia->nombreGeneral,['class'=>"form-control",'placeholder'=>"Ingrese nombre",'required']) !!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Link Tipografia</label>
                            <textarea name="linkTipografia" class="form-control" required id="" cols="30" rows="10">{{ $tipografia->linkTipografia }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Nombre Tipografia</label>
                            {!! Form::text('nombreTipografia',$tipografia->nombreTipografia,['class'=>"form-control",'placeholder'=>"Ingrese nombre tipografia",'required']) !!}
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
