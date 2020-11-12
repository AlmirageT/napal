@extends('layouts.admin.app')
@section('title')
Comunas
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12" align="center">
        <h3>Editar Comuna</h3> 
    </div>
</div>
{!! Form::open(['route' => ['mantenedor-comunas.update',$comuna->idComuna], 'method' => 'PUT','files'=>true]) !!}
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="">Nombre Comuna</label>
                {!!Form::text('nombreComuna',$comuna->nombreComuna,['class'=>"form-control", 'placeholder'=>"Ingrese un nombre..." , 'required'])!!}
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label>Pais</label>
                {!! Form::select('idPais', $paises,$comuna->idPais,['class'=>"form-control",'placeholder'=>"Ingrese el pais de residencia",'required','id'=>"paises_edit", 'onchange'=>"sacarRegionPorPaisEdit(this.value)"]) !!}
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label>Región</label>
                {!! Form::select('idRegion', $regiones,$comuna->idRegion,['class'=>"form-control",'placeholder'=>"Seleccione una region",'required','id'=>"select_regiones_edit", 'onchange'=>"sacarProvinciaPorRegionEdit(this.value)"]) !!}
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label>Provincia</label>
                {!! Form::select('idProvincia', $provincias,$comuna->idProvincia,['class'=>"form-control",'placeholder'=>"Seleccione una provincia",'required','id'=>"select_provincias_edit"]) !!}
            </div>
        </div>
        <button class="btn btn-primary btn-block">
            Actualizar
        </button>
    </div>
{!!Form::close()!!}
@endsection
