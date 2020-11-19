@extends('layouts.login.app')

@section('title', 'Tu cuenta ya está activada')

@section('css')
@endsection

@section('content')
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="/img/login.jpg" alt="">
						<div class="hover">
							<h4><strong>¡No pierdas la oportunidad de ser parte del gigante que está cambiando el mundo del corretaje!</strong></h4>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h4>Tu cuenta ya está activada</h4>
						<p>Ya puedes ingresar en isbast con tu cuenta de acceso! <a href="/login">Conéctate</a></p>

						<div class="col-md-12 form-group">
							<p><a href="/">Volver al inicio</a></p>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('scripts')

@endsection