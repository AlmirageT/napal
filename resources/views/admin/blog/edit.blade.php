<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="edit{{$blog->idBlog}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			{!! Form::open(['route' => ['mantenedor-blog.update',$blog->idBlog], 'method' => 'PUT']) !!}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Editar Blog
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Nombre Blog</label>
                            {!! Form::text('nombreBlog', $blog->nombreBlog,['class'=>"form-control",'placeholder'=>"Ingrese nombre",'required']) !!}

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Texto Blog</label>
                            <textarea name="textoBlog" required class="form-control summernote" cols="30" rows="10">{!! $blog->textoBlog !!}</textarea>
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
