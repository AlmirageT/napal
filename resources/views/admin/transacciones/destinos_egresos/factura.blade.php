@extends('layouts.admin.app')
@section('title')
Detalle Destino Egreso
@endsection
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<div align="center">
				<h3>Detalle Destino Egreso</h3>
			</div>
			<a href="{{ asset('napalm/destinos-egresos') }}" class="btn btn-light">Volver</a>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-lg-4">
					<div class="form-group">
						<label>Nombre Usuario</label>
						{!!Form::text('nombre',$destinoEgreso->nombre,['class'=>"form-control", 'placeholder'=>"Ingrese sus nombres",'required','disabled'])!!}
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Apellido Usuario</label>
						{!! Form::text('apellido',$destinoEgreso->apellido,['class'=>"form-control", 'placeholder'=>"Ingrese sus apellidos", 'required','disabled']) !!}
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Correo</label>
						{!! Form::email('correo',$destinoEgreso->correo,['class'=>"form-control", 'placeholder'=>"ejemplo@ejemplo.com", 'required','disabled']) !!}
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>Rut</label>
						{!! Form::text('rut',$destinoEgreso->rut,['class'=>"form-control",'placeholder'=>"Ingrese su rut sin puntos ni guiones",'required','disabled']) !!}
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>Monto</label>
						{!! Form::text('monto',number_format($destinoEgreso->monto,0,',','.'),['class'=>"form-control",'placeholder'=>"Ingrese su rut sin puntos ni guiones",'required','disabled']) !!}
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>Moneda</label>
						{!! Form::text('moneda',$destinoEgreso->nombreMoneda,['class'=>"form-control",'placeholder'=>"Ingrese su rut sin puntos ni guiones",'required','disabled']) !!}
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>ITAC</label>
						{!! Form::text('itac',$destinoEgreso->itac,['class'=>"form-control",'placeholder'=>"Ingrese su rut sin puntos ni guiones",'required','disabled']) !!}
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>WebClient</label>
						{!! Form::text('webClient',$destinoEgreso->webClient,['class'=>"form-control",'placeholder'=>"Ingrese la profesión",'required','disabled']) !!}
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Tipo Pago</label>
						{!! Form::text('nombreTipoMedioPago',$destinoEgreso->nombreTipoMedioPago,['class'=>"form-control",'placeholder'=>"Ingrese la dirección",'required','required','disabled']) !!}
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Estado</label>
						{!! Form::text('nombreEstado',$destinoEgreso->nombreEstado,['class'=>"form-control",'placeholder'=>"Ingrese numeración de su casa",'required','disabled']) !!}
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<label>Nombre Banco</label>
						{!! Form::text('nombreBanco',$destinoEgreso->nombreBanco,['class'=>"form-control",'placeholder'=>"Ingrese el código postal",'required','disabled']) !!}
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Nombre Destinatario</label>
						{!! Form::text('nombreDestinatario',$destinoEgreso->nombreDestinatario,['class'=>"form-control",'required','disabled']) !!}
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Código Swift</label>
						{!! Form::text('codigoSwift',$destinoEgreso->codigoSwift,['class'=>"form-control",'required','disabled']) !!}
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Numero Cuenta</label>
						{!! Form::text('numeroCuenta',$destinoEgreso->numeroCuenta,['class'=>"form-control",'required','disabled']) !!}
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<label>Notas</label>
						<textarea disabled class="form-control" name="notas">{{ $destinoEgreso->notas }}</textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<a href="{{ asset('napalm/destinos-egresos') }}" class="btn btn-primary btn-block">Volver</a>
		</div>
	</div>
</div>
@endsection