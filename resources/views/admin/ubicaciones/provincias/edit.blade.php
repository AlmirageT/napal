@extends('layouts.admin.app')
@section('title')
Provincias
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12" align="center">
        <h3>Editar Provincia</h3> 
    </div>
</div>
{!! Form::open(['route' => ['mantenedor-provincias.update',$provincia->idProvincia], 'method' => 'PUT','files'=>true]) !!}
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="">Nombre provincia</label>
                {!!Form::text('nombreProvincia',$provincia->nombreProvincia,['class'=>"form-control", 'placeholder'=>"Ingrese un nombre..." , 'required'])!!}
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label>Pais</label>
                {!!Form::select('idPais',$paises,$provincia->idPais,['class'=>"form-control", 'placeholder'=>"Seleccione un pais" , 'required','onchange'=>"sacarRegionPorPais(this.value)"])!!}
            </div>
        </div> 
        <div class="col-lg-12">
            <div class="form-group">
                <label>Regiones</label>
                {!!Form::select('idRegion',$regiones,$provincia->idRegion,['class'=>"form-control", 'placeholder'=>"Seleccione una region" , 'required'])!!}
            </div>
        </div>
        <button class="btn btn-primary btn-block">
            Actualizar
        </button>
    </div>
{!!Form::close()!!}
@endsection