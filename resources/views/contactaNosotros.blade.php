@extends('layouts.public.app')
@section('title','Contacta con Nosotros')
@section('content')
<div class="container">
	<br>
	<div class="row">
		<div class="col-lg-12" align="center">
			<h2>Contacto</h2>
		</div>
		
		<div class="col-lg-12" align="center">
			<hr>
			<h4>Rellena este formulario y nuestro equipo se pondrá en contacto contigo lo antes posible</h4>
			<br>
			<br>
		</div>
	</div>
	<div class="card">
		<form action="{{ asset('enviar-solicitud') }}" method="POST">
			@csrf
			<div class="card-body">
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Nombre y apellidos</label>
							<input type="text" name="nombre" required class="form-control">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Tu email</label>
							<input type="email" name="email" required class="form-control">
						</div>
					</div>
					<div class="col-lg-8">
						<label>Escoge tu asunto</label>
						<select class="form-control" name="asunto" required>
							<option value="">Seleccione</option>
							<option value="Solicitud Informacion">Solicitud de información general</option>
							<option value="Registrarse">Quiero Registrarme</option>
							<option value="Usuario Consulta">Soy usuario y tengo consultas</option>
							<option value="Problemas Al Intentar Ingresar">Problemas al intentar ingresar a mi area de inversor</option>
							<option value="Soy Promotor">Soy promotor</option>
							<option value="Otro Asunto">Otro asunto</option>
						</select>
					<br>
					</div>
					<div class="col-lg-12">
						<label>Tu mensaje</label>
						<textarea class="form-control" required name="mensaje"></textarea>
						<br>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
		                   {!! NoCaptcha::renderJs() !!}
		                   {!! NoCaptcha::display() !!}
		                </div>
					</div>
				</div>
				<div class="row">
		          <div class="col-lg-12 form-group">
		              <div class="input-group mb-3">
		                <div class="input-group-prepend">
		                    <input type="checkbox" id="condiciones" name="condiciones" required> &nbsp;&nbsp;
		                    <label for="">Acepto las <a target="_blank" href="{{ asset('politicas-privacidad') }}" style="color: blue">condiciones de servicios</a> de NAPALM y los terminos y condiciones de ISBAST</label>
		                </div>
		              </div>
		          </div>
		        </div>
		        <div class="form-group" align="center">
		        	<button class="btn btn-danger" type="submit">Enviar</button>
		        </div>
		    </div>
	    </form>
	</div>
	<br>
</div>
@endsection
