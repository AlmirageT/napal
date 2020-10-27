@extends('layouts.login.app')

@section('title', 'isbast - Cuenta creada')

@section('css')
@endsection

@section('content')
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">

				<div class="col-lg-12">
					<div class="login_form_inner m-2">
						<h4>¡Tu cuenta ha sido activada con éxito!</h4>
						<p>Introduce el rut para iniciar</p>
						<form class="row login_form" action="/login" method="POST" id="contactForm" novalidate="novalidate">
							@csrf
							<div class="col-md-12 form-group">
								@if (isset($errors) && $errors->has('rut'))
									<h6><strong><font color="red">* Campo obligatorio</font> </strong></h6>
								@endif
								<input type="text" class="form-control" id="rut" name="rut" oninput="checkRut(this)" placeholder="rut">
							</div>
							<div class="col-md-12 form-group">
								@if (isset($errors) && $errors->has('contrasena'))
									<h6><strong><font color="red">* Campo obligatorio</font> </strong></h6>
								@endif
								<input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="contraseña">
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">Conéctacte</button>
								<a href="/olvidoClave">¿Olvidaste la contraseña?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('scripts')

@endsection
