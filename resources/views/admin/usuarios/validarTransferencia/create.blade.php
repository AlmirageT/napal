<button class="btn btn-primary" data-toggle="modal" data-target="#create">Agregar Transferencia<i class="fas fa-plus"></i></button>

<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="create" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        {!!Form::open(['route' => 'mantenedor-transacciones.store', 'method' => 'POST','files'=>true])!!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Nueva Transferencia
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Nombre del Banco de Origen</label>
                            {!!Form::text('nombreBancoOrigen',null,['class'=>"form-control", 'placeholder'=>"Ingrese el nombre del banco de origen..." , 'required'])!!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Número de la Operación</label>
                            {!!Form::number('numeroOperacion',null,['class'=>"form-control", 'placeholder'=>"Ingrese el numero de la operacion..." , 'required'])!!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Banco Origen</label>
                            {!!Form::text('bancoOrigen',null,['class'=>"form-control", 'placeholder'=>"Ingrese el nombre del banco de origen..." , 'required'])!!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Fecha Depósito</label>
                            {!!Form::date('fechaDeposito',null,['class'=>"form-control" , 'required'])!!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Número Cuenta Bancaria</label>
                            {!!Form::number('numeroCuentaBanco',null,['class'=>"form-control", 'placeholder'=>"Ingrese el numero de cuenta..." , 'required'])!!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Monto Depósito</label>
                            {!!Form::number('montoDeposito',null,['class'=>"form-control", 'placeholder'=>"Ingrese el monto..." , 'required'])!!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Imagen Depósito</label>
                            <input type="file" name="rutaImagen" required="" class="form-control" onchange="onFileSelected(event)">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <img id="myimage" height="180">
                        </div>                  
                    </div>
                    <input type="hidden" name="idUsuario" value="{{ $usuario->idUsuario }}">
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
<script type="text/javascript">
    function onFileSelected(event) {
      var selectedFile = event.target.files[0];
      var reader = new FileReader();
      var imgtag = document.getElementById("myimage");
      imgtag.title = selectedFile.name;
      reader.onload = function(event) {
        imgtag.src = event.target.result;
      };
      reader.readAsDataURL(selectedFile);
    }
</script>