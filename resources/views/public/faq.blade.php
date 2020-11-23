@extends('layouts.public.app')
@section('title','Preguntas Frecuentes')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12" align="center">
			<h6>SI TIENES ALGUNA DUDA</h6>
			<h4>Visita nuestra página de FAQs</h4>
			<br>
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-3">
							<img src="https://static.housers.com/assets/images/icono-faq-1.svg" class="img-responsive">
						</div>
						<div class="col-lg-9">
							<br>
							<h5>Quiero darme de alta</h5>
						</div>
						<div class="col-lg-12">
							<p>¿Cuál es el procedimiento para registrarme, si soy persona física?</p>
							<p>¿Cuál es el procedimiento para registrarme, si soy persona jurídica?</p>
							<p>¿Por qué he de registrarme en Housers?</p>
						</div>
					</div>
				</div>
			</div>
		<br>
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-3">
							<img src="https://static.housers.com/assets/images/icono-faq-2.svg" class="img-responsive">
						</div>
						<div class="col-lg-9">
							<br>
							<h5>Quiero invertir</h5>
						</div>
						<div class="col-lg-12">
							<p>Pasos a seguir una vez que me he registrado en Housers.</p>
							<p>¿Qué es mi cuenta Housers?</p>
							<p>¿Qué implicaciones tiene la cuenta Housers?</p>							
						</div>
					</div>
				</div>
			</div>
		<br>
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-3">
							<img src="https://static.housers.com/assets/images/icono-faq-3.svg" class="img-responsive">
						</div>
						<div class="col-lg-9">
							<br>
							<h5>Ya he invertido</h5>
						</div>
						<div class="col-lg-12">
							<p>Una vez que he invertido ¿cómo puedo saber los avances del proyecto?</p>
							<p>¿Cómo puedo consultar mis inversiones?</p>
							<p>¿Qué rentabilidad puedo esperar?</p>
						</div>
					</div>
				</div>
			</div>
		<br>
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-3">
							<img src="https://static.housers.com/assets/images/icono-faq-4.svg" class="img-responsive">
						</div>
						<div class="col-lg-9">
							<br>
							<h5>Canal de Comunicación Directa (CCD)</h5>
						</div>
						<div class="col-lg-12">
							<p>¿Qué es el CCD?</p>
							<p>¿Qué proyectos tienen disponible el CCD?</p>
							<p>¿Qué pasa con los proyectos que ya tenían activado el CCD?</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-3">
							<img src="https://static.housers.com/assets/images/icono-faq-5.svg" class="img-responsive">
						</div>
						<div class="col-lg-9">
							<br>
							<h5>Riesgos y garantías</h5>
						</div>
						<div class="col-lg-12">
							<p>BONDHOLDER</p>
							<p>¿QUÉ EXTRACOSTE TIENE PARA EL INVERSOR ESTA GARANTÍA HIPOTECARIA?</p>
							<p>¿QUIÉN DECIDE EJECUTAR LA GARANTÍA HIPOTECARIA?</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-3">
							<img src="https://static.housers.com/assets/images/icono-faq-6.svg" class="img-responsive">
						</div>
					 	<div class="col-lg-9">
						 	<br>
						 	<h5>Definiciones</h5>
					 	</div>
					 	<div class="col-lg-12">
					 		<p>Préstamo participativo</p>
					 		<p>Oportunidades de Ahorro</p>
					 		<p>Oportunidades de Inversión</p>
					 	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-lg-12" align="center">
			<br>
			<br>
			<h3>Preguntas frecuentes</h3>
			<hr>
			<br>
		</div>
		@foreach($tiposFaqs as $tipoFaq)
			<div class="col-lg-4" align="right">
				<br>
				<h4>{{ $tipoFaq->nombreTipoFaq }}</h4>
			</div>
			<div class="col-lg-8">
				<div id="accordion">
					@foreach($faqs->where('idTipoFaq', $tipoFaq->idTipoFaq) as $faq)
					    <div class="card">
					    	<div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
						          {{ $faq->tituloFaq }}
						        </button>
						      </h5>
					    	</div>
						    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
					         	<div class="card-body">
							        {{ $faq->subTituloFaq }}
							    </div>
						    </div>
					  	</div>
				    @endforeach
				</div>
			</div>
		@endforeach
	</div>
	<br>
</div>
@endsection