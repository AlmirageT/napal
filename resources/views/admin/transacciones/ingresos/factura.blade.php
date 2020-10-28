@extends('layouts.admin.app')
@section('title')
Detalle Ingreso
@endsection
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<div align="center">
				<h3>Detalle Ingreso</h3>
			</div>
			<a href="{{ asset('napalm/ingresos') }}" class="btn btn-light">Volver</a>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-lg-4">
					<div class="form-group">
						<label>Nombre Usuario</label>
						{!!Form::text('nombre',$ingreso->nombre,['class'=>"form-control", 'placeholder'=>"Ingrese sus nombres",'required','disabled'])!!}
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Apellido Usuario</label>
						{!! Form::text('apellido',$ingreso->apellido,['class'=>"form-control", 'placeholder'=>"Ingrese sus apellidos", 'required','disabled']) !!}
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Correo</label>
						{!! Form::email('correo',$ingreso->correo,['class'=>"form-control", 'placeholder'=>"ejemplo@ejemplo.com", 'required','disabled']) !!}
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>Rut</label>
						{!! Form::text('rut',$ingreso->rut,['class'=>"form-control",'placeholder'=>"Ingrese su rut sin puntos ni guiones",'required','disabled']) !!}
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>Monto</label>
						{!! Form::text('monto',number_format($ingreso->monto,0,',','.'),['class'=>"form-control",'placeholder'=>"Ingrese su rut sin puntos ni guiones",'required','disabled']) !!}
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>Moneda</label>
						{!! Form::text('moneda',$ingreso->nombreMoneda,['class'=>"form-control",'placeholder'=>"Ingrese su rut sin puntos ni guiones",'required','disabled']) !!}
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>ITAC</label>
						{!! Form::text('itac',$ingreso->itac,['class'=>"form-control",'placeholder'=>"Ingrese su rut sin puntos ni guiones",'required','disabled']) !!}
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>WebClient</label>
						{!! Form::text('webClient',$ingreso->webClient,['class'=>"form-control",'placeholder'=>"Ingrese la profesión",'required','disabled']) !!}
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Tipo Pago</label>
						{!! Form::text('nombreTipoMedioPago',$ingreso->nombreTipoMedioPago,['class'=>"form-control",'placeholder'=>"Ingrese la dirección",'required','required','disabled']) !!}
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Estado</label>
						{!! Form::text('nombreEstado',$ingreso->nombreEstado,['class'=>"form-control",'placeholder'=>"Ingrese numeración de su casa",'required','disabled']) !!}
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<a href="{{ asset('napalm/ingresos') }}" class="btn btn-primary btn-block">Volver</a>
		</div>
	</div>
</div>
@endsection