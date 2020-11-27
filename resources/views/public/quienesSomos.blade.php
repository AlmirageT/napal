@extends('layouts.public.app')
@section('title','Quienes Somos')
@section('css')
<style type="text/css">
	.triangulo-animado-texto{
		margin-top: -243px;
		margin-left: 610px;
		z-index: 1;
	}
	.contenedor-mosaico {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        left: 0;
        right: 0,
    }
    .img {
        width: 25%;
    }

@media only screen and (min-width:320px) and (max-width: 767px) {
	.img {
        width: 50%;
    }
    .triangulo-animado-texto{
		margin-top: -180px;
		margin-left: 40px;
		z-index: 1;
	}
	.higherP{
		font-size: 18px;
	}
	.triangle{
		height: 306px;
		width: 336px;
	}
	.imagen-reunion{
		margin-left: -15px;
	}
	

}
@media only screen and (min-width:320px) and (max-width: 575px) {
	#seguridad{
		margin-left: -123px;
	}
	#justicia{
		margin-top: -97px;
	}
	#facilidad{
		margin-left: 210px;
		margin-top: -98px;
	}
	#transparencia{
		margin-left: -66px;
	}
	#calidad{
		margin-left: 115px;
		margin-top: -122px;
	}
}
@media only screen and (min-width:768px) and (max-width: 991px) {
    .triangulo-animado-texto{
		margin-top: -180px;
		margin-left: 40px;
		z-index: 1;
	}
	.higherP{
		margin-left: 250px;
	}
	.lowerP{
		margin-left: 252px;
	}
}
</style>
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12" align="center">
			<svg width="422px" height="405px" class="triangle" viewBox="0 0 422 405" version="1.1" xmlns="http://www.w3.org/2000/svg">
		        <defs>
		            <linearGradient x1="80.5096495%" y1="25.6038567%" x2="6.69326106%" y2="43.3414189%" id="linearGradient-1">
		                <stop stop-color="#ADE4E2" offset="0%"></stop>
		                <stop stop-color="#58B2B1" offset="100%"></stop>
		            </linearGradient>
		        </defs>
		        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(-359.000000, -189.000000)">
		            <g transform="translate(329.000000, 189.000000)" fill="url(#linearGradient-1)">
		                <path id="triangulo" transform="translate(270.500000, 268.000000) rotate(65.000000) translate(-270.500000, -268.000000) " d="M70 64 471 161.427365 139.163616 472z" style="display: inline;" data-original="M7 6.4 4.71 1.61427365 1.39163616 4.72z"></path>
		                <path id="trianguloGrande" transform="translate(270.500000, 268.000000) rotate(65.000000) translate(-270.500000, -268.000000) " d="M70 64 471 161.427365 139.163616 472z"></path>
		            </g>
		        </g>
		    </svg>
		</div>
		<div class="triangulo-animado-texto" style="display: block;">
            <h2 class="higherP">PRIMERA PLATAFORMA<br>PANEUROPEA DE INVERSIÓN<br>EN ACTIVOS INMOBILIARIOS</h2>
            <p class="lowerP">¿Nos acompañas?</p>
        </div>
	</div>
	<br>
	<div class="row">
		<div class="col-lg-6">
			<p>
				Housers es la primera plataforma de financiación participativa que ha revolucionado las reglas del juego haciendo posible la democratización de la inversión en activos inmobiliarios. Hoy gracias a Housers miles de inversores pueden conseguir el máximo rendimiento para sus ahorros con una facilidad y una diversificación como nunca antes habían imaginado.
				<br>
				Housers te permite invertir en activos que puedes ver y tocar ya que todas las inversiones están siempre vinculadas a bienes inmobiliarios.
			</p>
		</div>
		<div class="col-lg-6">
			<p>
				De esta forma puedes construir un patrimonio a largo plazo y conseguir ingresos mes a mes.
				<br>
				Gracias a que estamos presentes en varios países, la capacidad de diversificación de nuestros usuarios aumenta y marca la diferencia en el sector porque Housers es la primera plataforma paneuropea que ofrece este tipo de activos de forma integrada en un único lugar.
				<br>
				Sin duda Housers es la mejor opción para asegurarte un magnífico futuro financiero a partir de sólo 50€ al mes.
			</p>
		</div>
	</div>
	<br>
	<div class="row">
		<br>
		<div class="col-lg-12" align="center">
		<br>
			<h2>Somos expertos financieros que buscamos que tu inversión consiga el máximo rendimiento posible</h2>
			<br>
			<p>Junto con las más avanzadas herramientas de BIG DATA y los mejores Partners, <br>
				queremos que tus ahorros crezcan de la forma más segura.</p>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-lg-12" align="right">
			<br>
			<br>
			<br>
			<img class="lazy img-responsive imagen-reunion" alt="Equipo" src="https://static.housers.com/assets/images/quienes-somos/team-lines.svg" style="">
		</div>
	</div>
</div>
<div class="contenedor-mosaico">
    <img src="{{ asset('img/img.jpg') }}" class="img" alt="">
      <img src="{{ asset('img/img.jpg') }}" class="img" alt="">
        <img src="{{ asset('img/img.jpg') }}" class="img" alt="">
        <img src="{{ asset('img/img.jpg') }}" class="img" alt="">
      <img src="{{ asset('img/img.jpg') }}" class="img" alt="">
        <img src="{{ asset('img/img.jpg') }}" class="img" alt="">
               <img src="{{ asset('img/img.jpg') }}" class="img" alt="">
      <img src="{{ asset('img/img.jpg') }}" class="img" alt="">
        <img src="{{ asset('img/img.jpg') }}" class="img" alt="">
                     <img src="{{ asset('img/img.jpg') }}" class="img" alt="">
      <img src="{{ asset('img/img.jpg') }}" class="img" alt="">
        <img src="{{ asset('img/img.jpg') }}" class="img" alt="">
<br>    
<br>    
</div>
<div>
	<br>    
	<br>    
	<div class="container">
		<div class="row">
			<div class="col-lg-12" align="center"><h3>Houser's Team</h3><br><br></div>
		</div>
	</div>
	<img class="lazy img-responsive main" alt="Equipo" src="https://static.housers.com/assets/images/quienes-somos/housers-team.jpg" style="width: 100%; height: 100%">
	<br>
</div>
<div class="container">
	<br>
	<br>
	<div class="row">
		<div class="col-lg-6">
			<br>
			<br>
			<div class="row">
				<div class="col-lg-12"><h4>¿En qué creemos?</h4><br><br><br><br></div>
				<div class="col-lg-12 col-sm-12">
					<div class="row" align="center">
						<div class="col-lg-4 col-sm-4" id="seguridad">
							<img class="lazy img-responsive" alt="Seguridad"  src="https://static.housers.com/assets/images/quienes-somos/seguridad.svg" style="">
							<p>Seguridad</p>
						</div>
						<div class="col-lg-4 col-sm-4" id="justicia">
							<img class="lazy img-responsive" alt="Justicia"  src="https://static.housers.com/assets/images/quienes-somos/justicia.svg" style="">
							<p>Justicia</p>
						</div>
						<div class="col-lg-4 col-sm-4" id="facilidad">
							<img class="lazy img-responsive" alt="Facilidad" src="https://static.housers.com/assets/images/quienes-somos/facilidad.svg" style="">
							<p>Facilidad</p>
							<br>
						</div>
						<div class="col-lg-12 col-sm-12">
							<br>
							<br>
						</div>
						<div class="col-lg-6 col-sm-6" id="transparencia">
							<img class="lazy img-responsive" alt="Transparencia"  src="https://static.housers.com/assets/images/quienes-somos/transparencia.svg" style="">
							<p>Transparencia</p>
							<br>
						</div>
						<div class="col-lg-6 col-sm-6" id="calidad">
							<img class="lazy img-responsive" alt="Calidad" src="https://static.housers.com/assets/images/quienes-somos/calidad.svg" style="">
							<p>Calidad</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<br>
			<br>
			<div class="row">
				<div class="col-lg-12"><h4>Manifiesto</h4><br><br></div>
				<div class="col-lg-12">
					<p>1 La entidad de pago que trabaja con nosotros, Lemon Way, está autorizada por el Banco de España.</p>
				</div>
				<div class="col-lg-12">
					<p>2 Creemos que todo el mundo debe poder invertir, por eso lo hacemos posible a partir de 50€.</p>
				</div>
				<div class="col-lg-12">
					<p>3 Ponemos a tu disposición toda la información sobre tus inversiones, asegurando la máxima transparencia.</p>
				</div>
				<div class="col-lg-12">
					<p>4 Los proyectos publicados son cuidadosamente seleccionados por nuestros expertos inmobiliarios en las ciudades europeas con mayor proyección.</p>
				</div>
				<div class="col-lg-12">
					<p>5 Un equipo de expertos financieros externos a Housers se encargará de analizar el riesgo de cada operación gracias a un sistema específico de scoring.</p>
				</div>
				<div class="col-lg-12">
					<p>6 Lo hacemos fácil y sencillo. Pudiendo empezar a invertir cuando y donde quieras a través de nuestra plataforma.</p>
				</div>
			</div>
		</div>
		<div class="col-lg-12" align="center">
			<br>
			<br>
            <a href="{{ asset('registro') }}" class="btn btn-danger"><small>Registrate</small></a>
		</div>
	</div>
	<br>
	<br>
	<div class="row">
		<div class="col-lg-12" align="center">
			<h3>¿Quieres saber mas?</h3>	
			<br>
			<br>
		</div>
		<div class="col-lg-12" align="center">
			<a target="_blank" href="{{ asset('saber-mas') }}" class="btn btn-danger"><small style="color: white">QUIERES SABER MÁS</small></a>
			<br>

		</div>
	</div>
			<br>
			<br>

</div>
@endsection