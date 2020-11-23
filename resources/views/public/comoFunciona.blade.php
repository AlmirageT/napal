@extends('layouts.public.app')
@section('title','Como Funciona')
@section('css')
<style type="text/css">
.circle {
  padding: 13px 20px;
  border-radius: 50%;
  background-color: #ED8D8D;
  color: #fff;
  max-height: 50px;
  z-index: 2;
}

.how-it-works.row .col-2 {
  align-self: stretch;
}
.how-it-works.row .col-2::after {
  content: "";
  position: absolute;
  border-left: 3px solid #ED8D8D;
  z-index: 1;
}
.how-it-works.row .col-2.bottom::after {
  height: 50%;
  left: 50%;
  top: 50%;
}
.how-it-works.row .col-2.full::after {
  height: 100%;
  left: calc(50% - 3px);
}
.how-it-works.row .col-2.top::after {
  height: 50%;
  left: 50%;
  top: 0;
}


.timeline div {
  padding: 0;
  height: 40px;
}
.timeline hr {
  border-top: 3px solid #ED8D8D;
  margin: 0;
  top: 17px;
  position: relative;
}
.timeline .col-2 {
  display: flex;
  overflow: hidden;
}
.timeline .corner {
  border: 3px solid #ED8D8D;
  width: 100%;
  position: relative;
  border-radius: 15px;
}
.timeline .top-right {
  left: 50%;
  top: -50%;
}
.timeline .left-bottom {
  left: -50%;
  top: calc(50% - 3px);
}
.timeline .top-left {
  left: -50%;
  top: -50%;
}
.timeline .right-bottom {
  left: 50%;
  top: calc(50% - 3px);
}
</style>
@endsection
@section('content')
<div class="">
  <div class="container">
    <h2 class="pb-3 pt-2 border-bottom mb-5" align="center">Todo lo que tienes que saber <br> para empezar a ahorrar con Housers</h2>
    <!--first section-->
    <div class="row align-items-center how-it-works d-flex">
      <div class="col-2 text-center bottom d-inline-flex justify-content-center align-items-center" style="margin-top: -160px;">
        <div class="circle font-weight-bold">1</div>
      </div>
      <div class="col-6">
        <h5>Registrate Gratis</h5>
        <p>Este paso te permitirá acceder a toda la información disponible sobre nuestras oportunidades.</p>
        <p>¡Es totalmente gratuito y sólo te llevará unos segundos!</p>
        <a href="{{ asset('registro') }}" class="btn btn-danger"><small>REGISTRATE GRATIS</small></a>
        <br>
      </div>
      <div class="col-4">
      	<img id="paso1" data-src="https://static.housers.com/assets/images/how-it-works/paso1.gif" src="https://static.housers.com/assets/images/how-it-works/paso1.gif" class="img-responsive">
      </div>
    </div>
    <!--path between 1-2-->
    <div class="row timeline">
      <div class="col-2">
        <div class="corner top-right"></div>
      </div>
      <div class="col-8">
        <hr/>
      </div>
      <div class="col-2">
        <div class="corner left-bottom"></div>
      </div>
    </div>
    <!--second section-->
    <div class="row align-items-center justify-content-end how-it-works d-flex">
      <div class="col-2">
      	<img id="paso2a" data-src="https://static.housers.com/assets/images/how-it-works/paso2.gif" src="https://static.housers.com/assets/images/how-it-works/paso2.gif" class="img-responsive">
      </div>
      <div class="col-6 text-right">
        <h5>Crea tu Cuenta gratis</h5>
        <p>Para poder empezar a invertir en Housers deberás adjuntar una copia de tu DNI o Pasaporte para poder validar tu identidad como inversor. <br> ¡Es realmente rápido y sencillo!</p>
        <a href="{{ asset('registro') }}" class="btn btn-danger"><small>REGISTRATE GRATIS</small></a>
      </div>
      <div class="col-2 text-center full d-inline-flex justify-content-center align-items-center">
        <div class="circle font-weight-bold">2</div>
      </div>
    </div>
    <!--path between 2-3-->
    <div class="row timeline">
      <div class="col-2">
        <div class="corner right-bottom"></div>
      </div>
      <div class="col-8">
        <hr/>
      </div>
      <div class="col-2">
        <div class="corner top-left"></div>
      </div>
    </div>
    <!--third section-->
    <div class="row align-items-center how-it-works d-flex">
      <div class="col-2 text-center full d-inline-flex justify-content-center align-items-center" align="center" style="margin-left: 3px;">
        <div class="circle font-weight-bold">3</div>
      </div>
      <div class="col-6">
        <h5>Quiero empezar a Invertir </h5>
        <p>Con tu cuenta Housers activada ya puedes empezar a invertir. 
        	<br>
        	<strong>Tienes dos opciones: </strong>
        	<br>
        	<br>
        	<strong>MEDIANTE TRANSFERENCIA:</strong>
        	<br>
        	<br>
			Ten en cuenta que el dinero que transfieres a tu Cuenta Housers para invertir en las oportunidades tardará un par de días en estar disponible. Para ello utilizamos los servicios de Lemonway, entidad de pago especializada en proveer servicios de pago seguro. 
        </p>
      </div>
      <div class="col-2">
      	<img id="paso3-2" data-src="https://static.housers.com/assets/images/how-it-works/paso3-2.gif" src="https://static.housers.com/assets/images/how-it-works/paso3-2.gif" class="img-responsive padding-top-20">
      </div>
      <div class="col-5" align="right">
      	<img id="paso3-1a" data-src="https://static.housers.com/assets/images/how-it-works/paso3-1.gif" src="https://static.housers.com/assets/images/how-it-works/paso3-1.gif" class="img-responsive">
      </div>
      <div class="col-5">
      	<p>
      		<strong>¡Más rápido!</strong><br>
			<strong>INVERSIÓN DIRECTA CON TARJETA DE CRÉDITO:</strong> de esta forma podrás invertir directamente en las oportunidades que te gusten sin necesidad de esperar. 
      	</p>
        <a href="{{ asset('registro') }}" class="btn btn-danger"><small>REGISTRATE GRATIS</small></a>
      </div>
    </div>
    <!--path between 3-4-->
    <div class="row timeline">
      <div class="col-2">
        <div class="corner top-right"></div>
      </div>
      <div class="col-8">
        <hr/>
      </div>
      <div class="col-2">
        <div class="corner left-bottom"></div>
      </div>
    </div>
    <!--cuarta section-->
    <div class="row align-items-center justify-content-end how-it-works d-flex">

      <div class="col-8 text-center">
        <h5>Invierte en diferentes tipos de Oportunidades</h5>
        <p>Conoce los diferentes tipos de oportunidades que tenemos en Housers, elige las que más se ajusten a ti y diversifica tanto como puedas. </p>
      </div>

      <div class="col-2 text-center full d-inline-flex justify-content-center align-items-center">
        <div class="circle font-weight-bold">4</div>
      </div>
      <div class="col-lg-12">
      	<div class="row">
      		<div class="col-4" align="center">
	      		<a>
	    			<img id="paso4-1" data-src="https://static.housers.com/assets/images/how-it-works/paso4-1.gif" src="https://static.housers.com/assets/images/how-it-works/paso4-1.gif" class="img-responsive">
	    			<br>
	    			<strong>Ahorro</strong>
	    			<br>
	    			Inversión en inmuebles para explotación vía alquiler y posterior venta
	    			<br>
	    		</a>
	    		<br>
	    		<ul>
				  <li>Inversiones a largo plazo (5 a 10 años) con ingresos mensuales. <br></li>
				  <li>Ganas todos los meses la parte de alquiler proporcional a tu inversión. El valor de tu inversion cambia con la revalorización del inmueble. <strong> Cuando quieras, podrás poner a la venta tu inversión en el canal de comunicación habilitado por los promotores.</strong></li>
				</ul>
	    	</div>
	    	<div class="col-4" align="center">
	    		<a>
	    			<img id="paso4-2" data-src="https://static.housers.com/assets/images/how-it-works/paso4-2.gif" src="https://static.housers.com/assets/images/how-it-works/paso4-2.gif" class="img-responsive">
	    			<br>
	    			<strong>Inversión</strong>
	    			<br>
	    			Inversión en rehabilitación o construcción de inmuebles para su venta
	    			<br>
	    		</a>
	    		<br>
	    		<ul>
	    			<li>Inversiones planteadas entre 12 – 24 meses.</li>
	    			<li>Se recibe el capital y el beneficio de la inversión una vez alcanzada la revalorización objetivo fijada al inicio del proyecto.</li>
	    			<li>Sin ingresos mensuales (alquiler).</li>
	    			<li><strong>Cuando quieras, podrás poner a la venta tu inversión en el canal de comunicación habilitado por los promotores. </strong></li>
	    		</ul>
	    	</div>
	    	<div class="col-4" align="center">
	    		<a>
		    		<img id="paso4-3" data-src="https://static.housers.com/assets/images/how-it-works/paso4-3.gif" src="https://static.housers.com/assets/images/how-it-works/paso4-3.gif" class="img-responsive"><br>
		    		<strong>Tipo Fijo</strong>
		    		<br>
		    		Inversión en préstamos a promotores para obra nueva
		    		<br>
		    	</a>
		    	<ul>
		    		<li>Inversiones planteadas entre 12 - 36 meses. </li>
		    		<li>Independiente a la venta.</li>
		    		<li>Se comienza a recibir ingresos desde el primer mes.</li>
		    		<li>El capital se devuelve al final del periodo.</li>
		    		<li><strong>Cuando quieras, podrás poner a la venta tu inversión en el canal de comunicación habilitado por los promotores.</strong></li>
		    	</ul>
	    	</div>
      	</div>
      </div>
      	
    </div>
    <!--path between 4-5-->
    <div class="row timeline">
      <div class="col-2">
        <div class="corner right-bottom"></div>
      </div>
      <div class="col-8">
        <hr/>
      </div>
      <div class="col-2">
        <div class="corner top-left"></div>
      </div>
    </div>
    <!--quinta section-->
    <div class="row align-items-center how-it-works d-flex">
      <div class="col-2 text-center full d-inline-flex justify-content-center align-items-center" style="margin-left: 3px;">
        <div class="circle font-weight-bold">5</div>
      </div>
      <div class="col-6">
        <h5>Gestiona y saca el máximo partido a tus inversiones </h5>
        <br>
        <p><strong>En tu área privada podrás seguir la evolución de tus ahorros así como las actualizaciones que van surgiendo en las oportunidades.</strong> <br><br> Tu sólo preocúpate de elegir, lo demás, te lo damos todo hecho. Recuerda siempre que diversificar es probablemente uno de los factores más importantes a la hora de invertir. Invierte en diferentes ciudades, barrios, tipologías de inmuebles y tipos de oportunidades. En Housers te lo ponemos fácil. </p>
        <a href="{{ asset('registro') }}" class="btn btn-danger"><small>REGISTRATE GRATIS</small></a>
      </div>
      <div class="col-3" align="center">
      	<img id="paso5" data-src="https://static.housers.com/assets/images/how-it-works/paso5.gif" src="https://static.housers.com/assets/images/how-it-works/paso5.gif" class="img-responsive">
      </div>
    </div>
    <!--path between 5-6-->
    <div class="row timeline">
      <div class="col-2">
        <div class="corner top-right"></div>
      </div>
      <div class="col-8">
        <hr/>
      </div>
      <div class="col-2">
        <div class="corner left-bottom"></div>
      </div>
    </div>
    <!--sexta section-->
    <div class="row align-items-center justify-content-end how-it-works d-flex">
      <div class="col-6 text-right">
        <h5> Información básica para el inversor </h5>
        <a href="" class="btn btn-danger"><small>INFORMACIÓN</small></a>
        
      </div>
      <div class="col-2 text-center full d-inline-flex justify-content-center align-items-center">
        <div class="circle font-weight-bold">6</div>
      </div>
    </div>

    
  </div>
  <br>
</div>
<div class="container">
	<br>
	<br>
	<div class="row">
		<div class="col-lg-12"><h5>Si tienes alguna duda</h5></div>
		<div class="col-lg-12"><h4>Visita nuestra página de FAQs</h4><br></div>
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-12">
									<a>
										<img src="https://static.housers.com/assets/images/icono-faq-1.svg" class="img-responsive">&nbsp;Quiero darme de alta
									</a>
								</div>
								<div class="col-lg-12"><p>¿Cuál es el procedimiento para registrarme, si soy persona física?</p></div>
								<div class="col-lg-12"><p>¿Cuál es el procedimiento para registrarme, si soy persona jurídica?</p></div>
								<div class="col-lg-12"><p>¿Por qué he de registrarme en Housers?</p></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-12">
									<a>
										<img src="https://static.housers.com/assets/images/icono-faq-2.svg" class="img-responsive">&nbsp;Quiero invertir
									</a>

								</div>
								<div class="col-lg-12"><p>¿Qué implicaciones tiene la cuenta Housers?</p></div>
								<div class="col-lg-12"><p>¿Tiene algún coste mi cuenta Housers?</p></div>
								<div class="col-lg-12"><p>¿Por qué medios puedo ingresar fondos en mi cuenta Housers?.</p></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-12">
									<a>
										<img src="https://static.housers.com/assets/images/icono-faq-3.svg" class="img-responsive">&nbsp;Ya he invertido
										
									</a>
								</div>
								<div class="col-lg-12"><p>Una vez que he invertido ¿cómo puedo saber los avances del proyecto?</p></div>
								<div class="col-lg-12"><p>¿Cómo puedo consultar mis inversiones?</p></div>
								<div class="col-lg-12"><p>¿Qué rentabilidad puedo esperar?.</p></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12" align="center">
					<br>
					<a href="{{ asset('preguntas-frecuentes') }}" class="btn btn-danger"><small>VER TODOS LOS FAQ'S</small></a>
				</div>
				<div class="col-lg-12">
					<br>
					<br>
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-12" align="center"><h4>¿Quieres saber más?</h4><br><br></div>
								<div class="col-lg-3" align="center">
									<a>
										<img class="img-responsive center-img" src="https://static.housers.com/assets/images/how-it-works/housers-manual-inversor-es.svg" alt="Manual del inversor">
										<h5>Manual del inversor</h5>
									</a>
								</div>
								<div class="col-lg-3">
									<a>
										<img class="img-responsive center-img" src="https://static.housers.com/assets/images/how-it-works/housers-informe-espana-es.svg" alt="Evolución del Mercado Inmobiliario en España">
										<h5>Evolución del Mercado Inmobiliario en España</h5>
									</a>
								</div>
								<div class="col-lg-3">
									<a>
										<img class="img-responsive center-img" src="https://static.housers.com/assets/images/how-it-works/housers-informe-italia-es.svg" alt="Evolución del Mercado Inmobiliario en Italia">
										<h5>Evolución del Mercado Inmobiliario en Italia</h5>
									</a>
								</div>
								<div class="col-lg-3">
									<a>
										<img class="img-responsive center-img" src="https://static.housers.com/assets/images/how-it-works/housers-informe-portugal-es.svg" alt="Evolución del Mercado Inmobiliario en Portugal">
										<h5>Evolución del Mercado Inmobiliario en Portugal</h5>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
</div>
@endsection