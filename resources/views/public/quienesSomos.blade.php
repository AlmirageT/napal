@extends('layouts.public.app')
@section('title','Quienes Somos')
@section('css')
<style type="text/css">
	.triangulo-animado-texto{
		margin-top: -243px;
		margin-left: 610px;
		z-index: 1;
	}


</style>
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12" align="center">
			<svg width="422px" height="405px" viewBox="0 0 422 405" version="1.1" xmlns="http://www.w3.org/2000/svg">
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
			<img class="lazy img-responsive" alt="Equipo" src="https://static.housers.com/assets/images/quienes-somos/team-lines.svg" style="">
		</div>
	</div>
</div>
@endsection