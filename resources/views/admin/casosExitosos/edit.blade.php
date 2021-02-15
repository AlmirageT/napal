@extends('layouts.admin.app')
@section('title')
Casos Exitosos
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12" align="center">
        <h3>Editar Caso Exitoso</h3> 
    </div>
</div>
	{!! Form::open(['route' => ['mantenedor-casos-exitosos.update',$casoExitoso->idCasoExitoso], 'method' => 'PUT','files'=>true]) !!}
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label for="">Propiedades</label>
            {!! Form::select('idPropiedad', $propiedades,$casoExitoso->idPropiedad,['class'=>"form-control",'placeholder'=>"Ingrese la propiedad",'required']) !!}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label>Foto Perfil</label>
            <input type="file" name="imagenCasoExito" class="form-control" required onchange="onFileSelected(event)" size="102400" id="imagen">
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <img id="myimage" height="200">
        </div>                  
    </div>
    <button class="btn btn-primary btn-block">
        Actualizar
    </button>
</div>
    {!!Form::close()!!}
@endsection
<script>
    $(document).ready(function(){
        $('.js-example-basic-multiple').select2({});
    });
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