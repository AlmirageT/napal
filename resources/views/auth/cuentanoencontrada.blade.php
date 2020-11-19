@extends('layouts.login.app')

@section('title', 'Cuenta No encontrada')

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
						<h4>Cuenta no encontrada</h4>
						<p>Puede crear una nueva cuenta en isbast.com haciendo clic en <a href="/registro" class="txt2">Únete</a></p>

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