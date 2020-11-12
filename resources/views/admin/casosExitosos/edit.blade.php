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
	{!! Form::open(['route' => ['mantenedor-casos-exitosos.update',$casoExitoso->idCasoExitoso], 'method' => 'PUT']) !!}
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label for="">Propiedades</label>
            {!! Form::select('idPropiedad', $propiedades,$casoExitoso->idPropiedad,['class'=>"form-control",'placeholder'=>"Ingrese la propiedad",'required']) !!}
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
</script>