@extends('layouts.admin.app')
@section('title','Editar Transferencia')
@section('content')
<div class="row">
    <div class="col-lg-12" align="center">
        <h3>Editar Transferencia</h3>
    </div>
</div>
    {!!Form::open(['route' => ['mantenedor-transacciones.update',$trxDepositoTransferencia->idTrxDepoTransf], 'method' => 'PUT','files'=>true])!!}
    <input type="hidden" name="idUsuario" value="{{ $idUsuario }}">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="">Nombre del Banco de Origen</label>
                    {!!Form::text('nombreBancoOrigen',$trxDepositoTransferencia->nombreBancoOrigen,['class'=>"form-control", 'placeholder'=>"Ingrese el nombre del banco de origen..." , 'required'])!!}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="">Número de la Operación</label>
                    {!!Form::number('numeroOperacion',$trxDepositoTransferencia->numeroOperacion,['class'=>"form-control", 'placeholder'=>"Ingrese el numero de la operacion..." , 'required'])!!}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="">Banco Origen</label>
                    {!!Form::text('bancoOrigen',$trxDepositoTransferencia->bancoOrigen,['class'=>"form-control", 'placeholder'=>"Ingrese el nombre del banco de origen..." , 'required'])!!}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="">Fecha Depósito</label>
                    {!!Form::date('fechaDeposito',date('Y-m-d',strtotime($trxDepositoTransferencia->fechaDeposito)),['class'=>"form-control" , 'required'])!!}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="">Número Cuenta Bancaria</label>
                    {!!Form::number('numeroCuentaBanco',$trxDepositoTransferencia->numeroCuentaBanco,['class'=>"form-control", 'placeholder'=>"Ingrese el numero de cuenta..." , 'required'])!!}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="">Monto Depósito</label>
                    {!!Form::number('montoDeposito',$trxDepositoTransferencia->montoDeposito,['class'=>"form-control", 'placeholder'=>"Ingrese el monto..." , 'required'])!!}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="">Imagen Depósito</label>
                    <input type="file" name="rutaImagen"  class="form-control" onchange="onFileSelected(event)">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <img id="myimage" height="180" src="{{ asset($trxDepositoTransferencia->rutaImagen) }}">
                </div>                  
            </div>
        </div>
        <div class="col-lg-12">
            <button type="submit" class="btn btn-primary btn-block">Guardar Cambios</button>
        </div>
    {!!Form::close()!!}
@endsection

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