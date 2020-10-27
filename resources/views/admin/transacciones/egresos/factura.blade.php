@extends('layouts.admin.app')
@section('title')
Detalle Egreso
@endsection
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<div align="center">
				<h3>Detalle Egreso</h3>
			</div>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-lg-4">
					<div class="form-group">
						<label>Nombre</label>
						{!!Form::text('nombre',null,['class'=>"form-control", 'placeholder'=>"Ingrese sus nombres" , 'required'])!!}
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Apellidos</label>
						{!! Form::text('apellido',null,['class'=>"form-control", 'placeholder'=>"Ingrese sus apellidos", 'required']) !!}
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Correo</label>
						{!! Form::email('correo',null,['class'=>"form-control", 'placeholder'=>"ejemplo@ejemplo.com", 'required']) !!}
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Rut</label>
						{!! Form::text('rut',null,['class'=>"form-control",'placeholder'=>"Ingrese su rut sin puntos ni guiones",'required','onchange'=>"formateaRut(this.value)", 'id'=>"rut"]) !!}
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Contraseña</label>
						<input type="password" name="password" class="form-control" placeholder="*********" required>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Confirmar Contraseña</label>
						<input type="password" name="confirm_password" class="form-control" placeholder="*********" required>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<label>Foto Perfil</label>
						<input type="file" name="avatar" class="form-control" required onchange="onFileSelected(event)">
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<img id="myimage" height="200">
					</div>					
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<label>Profesión</label>
						{!! Form::text('profesion',null,['class'=>"form-control",'placeholder'=>"Ingrese la profesión",'required']) !!}
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Dirección 1</label>
						{!! Form::text('direccion1',null,['class'=>"form-control",'placeholder'=>"Ingrese la dirección",'required','id'=>"txtDireccion"]) !!}
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Número</label>
						{!! Form::text('direccion2',null,['class'=>"form-control",'placeholder'=>"Ingrese numeración de su casa",'required','id'=>"txtNumero"]) !!}
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Código postal</label>
						{!! Form::text('codigoPostal',null,['class'=>"form-control",'placeholder'=>"Ingrese el código postal",'required']) !!}
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>Latitud</label>
						{!! Form::text('latitud',null,['class'=>"form-control",'required','id'=>"latitud"]) !!}
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>Longitud</label>
						{!! Form::text('longitud',null,['class'=>"form-control",'required','id'=>"longitud"]) !!}
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
@endsection