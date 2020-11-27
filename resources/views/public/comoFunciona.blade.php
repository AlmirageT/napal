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


.primera-seccion{
  margin-top: -160px;
}
.tercera-seccion{
  margin-left: 3px;
  height: 440px;
}
.cuarta-seccion{
  height: 269px;
  margin-bottom: -21px;
  margin-top: 12px;
}
.quinta-seccion{
  margin-left: 3px;
}
.content{
  margin-top: -440px;
}
.content-uno{
  margin-left: 200px;
}
.content-cuatro{
  margin-right: 7%;
  margin-top: -272px;
}
.circulo{
  margin-top: -255px;
}
@media only screen and (min-width:1025px) and (max-width:1920px){ 
  .circulo-dos{
    margin-top: -143px;
  }
  .circulo-tres{
    margin-top: -389px;
  }
  .circulo-cinco{
    margin-top: -257px;
  }
}
@media only screen and (min-width:768px) and (max-width: 1024px) {
  .circulo-dos{
    margin-top: -152px;
  }
  .seccion-tres{
    height: 554px;
  }
  .circulo-tres{
    margin-top: -514px;
  }
  .content{
    margin-top: -554px;
  }
  .seccion-cuatro{
    height: 367px;
  }
  .mobile-circle{
    margin-top: -346px;
  }
  .oportunidades{
    margin-top: -56px;
    margin-left: 66px;
  }
  .circulo-cinco{
    margin-top: -347px;
  }
}
@media only screen and (min-width:320px) and (max-width: 767px) {
    .movil-h{
      margin-right: -45px;
      margin-left: 48px;
    }
    .movil-p{
      margin-right: -101px;
    }
    .movil-a{
      margin-top: 458px;
      margin-left: -120px;
    }
    .acortar{
      margin-top: -209px;
    }
    .button-mobile{
      margin-left: 56px;
    }
    .titulo-5{
      margin-left: -60px;
      margin-right: 16px;
    }
    #paso2a{
      margin-top: 543px;
      margin-left: 42px;
    }
    .parrafo{
      margin-left: -76px;
      margin-right: 22px;
    }
    .registrarte{
      margin-left: -26px;
      margin-right: 43px;
    }
    .segunda-seccion{
      margin-top: -230px;
    }
    .seccion-dos{
      margin-top: 224px;
    }
    .content{
      margin-top: -939px;
    }
    .seccion-tres{
      height: 930px;
    }
    .uno-content{
      margin-left: 56px;
    }
    .quiero-invertir{
      margin-left: 4px;
      margin-right: -88px;
    }
    .con-cuenta{
      margin-left: 4px;
      margin-right: -88px;
    }
    #paso3-2{
      margin-top: 416px;
      margin-left: -112px;
    }
    #paso3-1a{
      margin-top: 266px;
      margin-left: 131px;
    }
    .mas-rapido{
      margin-left: -97px;
      margin-right: -13px;
    }
    .responsive-button{
      margin-left: -40px;
    }
    .caja-texto-uno{
      margin-left: 103px;
    }
    .caja-texto-dos{
      margin-left: -118px;
    }
    .caja-texto-tres{
      margin-left: -118px;
    }
    #paso4-2{
      margin-top: 233px;
    }
    #paso4-3{
      margin-top: 466px;
    }
    .parrafo-dos{
      margin-left: -75px;
      margin-right: -118px;
    }
    .seccion-cuatro{
      height: 836px;
    }
    .oportunidades{
      margin-top: -550px;
    }
    .mobile-circle{
      margin-top: -822px;
    }
    .seccion-cinco{
      height: 721px;
    }
    .gestiona{
      margin-top: -213px;
    }
    .titulo-gestiona{
      margin-right: -90px;
    }
    .parrafo-cinco{
      margin-right: -90px;
    }
    .boton-cinco{
      margin-left: 41px;
    }
    #paso5{
      margin-top: 515px;
      margin-left: -200px;
    }
    .circulo-dos{
      margin-top: -442px;
    }
    .circulo-tres{
      margin-top: -884px;
    }
    .circulo-cinco{
      margin-top: -683px;
    }
    .circulo-h-info{
      margin-left: -90px;
    }
} 
</style>
@endsection
@section('content')
<div class="">
  <div class="container">
    <h2 class="pb-3 pt-2 border-bottom mb-5" align="center">Todo lo que tienes que saber <br> para empezar a ahorrar con Housers</h2>
    <!--first section-->
    <div class="row align-items-center how-it-works d-flex acortar">
      <div class="col-2 text-center bottom d-inline-flex justify-content-center align-items-center primera-seccion" >
        <div class="circle font-weight-bold">1</div>
      </div>
      <div class="col-6">
        <div class="row">
          <div class="col-lg-12">
            <h5 class="movil-h">Registrate Gratis</h5>
            <p class="movil-p">Este paso te permitirá acceder a toda la información disponible sobre nuestras oportunidades.</p>
            <p class="movil-p">¡Es totalmente gratuito y sólo te llevará unos segundos!</p>
            <a href="{{ asset('registro') }}" class="btn btn-danger button-mobile"><small>REGISTRATE GRATIS</small></a>
            <br>
          </div>
        </div>
      </div>
      <div class="col-4">
      	<img id="paso1" data-src="https://static.housers.com/assets/images/how-it-works/paso1.gif" src="https://static.housers.com/assets/images/how-it-works/paso1.gif" class="img-responsive  movil-a">
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
    <div class="row align-items-center justify-content-end how-it-works d-flex segunda-seccion">
      <div class="col-2">
      	<img id="paso2a" data-src="https://static.housers.com/assets/images/how-it-works/paso2.gif" src="https://static.housers.com/assets/images/how-it-works/paso2.gif" class="img-responsive">
      </div>
      <div class="col-6 text-right">
        <h5 class="titulo-5">Crea tu Cuenta gratis</h5>
        <p class="parrafo">Para poder empezar a invertir en Housers deberás adjuntar una copia de tu DNI o Pasaporte para poder validar tu identidad como inversor. <br> ¡Es realmente rápido y sencillo!</p>
        <a href="{{ asset('registro') }}" class="btn btn-danger registrarte"><small>REGISTRATE GRATIS</small></a>
      </div>
      <div class="col-2 text-center full d-inline-flex justify-content-center align-items-center seccion-dos">
        <div class="circle font-weight-bold circulo-dos">2</div>
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
      <div class="col-2 text-center full d-inline-flex justify-content-center align-items-center tercera-seccion seccion-tres" align="center" >
        <div class="circle font-weight-bold circulo-tres">3</div>
      </div>
      
      <div class="col-lg-12 content" >
        <div class="row">
          <div class="col-6 content-uno uno-content" >
            <h5 class="quiero-invertir">Quiero empezar a Invertir </h5>
            <p class="con-cuenta">Con tu cuenta Housers activada ya puedes empezar a invertir. 
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
          	<p class="mas-rapido">
          		<strong>¡Más rápido!</strong><br>
    			<strong>INVERSIÓN DIRECTA CON TARJETA DE CRÉDITO:</strong> de esta forma podrás invertir directamente en las oportunidades que te gusten sin necesidad de esperar. 
          	</p>
            <a href="{{ asset('registro') }}" class="btn btn-danger responsive-button"><small>REGISTRATE GRATIS</small></a>
          </div>
        </div>
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
      <div class="col-2 text-center full d-inline-flex justify-content-center align-items-center cuarta-seccion seccion-cuatro" >
        <div class="circle font-weight-bold circulo mobile-circle">4</div>
      </div>
      <div class="col-lg-12 content-cuatro" >
      	<div class="row oportunidades">
          <div class="col-12 text-center">
            <h5>Invierte en diferentes tipos de Oportunidades</h5>
            <p>Conoce los diferentes tipos de oportunidades que tenemos en Housers, elige las que más se ajusten a ti y diversifica tanto como puedas. </p>
          </div>
      		<div class="col-4 caja-texto-uno" align="center">
	      		<a>
  	    			<img id="paso4-1" data-src="https://static.housers.com/assets/images/how-it-works/paso4-1.gif" src="https://static.housers.com/assets/images/how-it-works/paso4-1.gif" class="img-responsive">
  	    			<br>
	    	  	</a>
            <p class="parrafo-dos">
  	    			<strong>Ahorro</strong>
  	    			<br>
  	    			Inversión en inmuebles para explotación vía alquiler y posterior venta
            </p>
	    	</div>
	    	<div class="col-4 caja-texto-dos" align="center">
	    		<a>
	    			<img id="paso4-2" data-src="https://static.housers.com/assets/images/how-it-works/paso4-2.gif" src="https://static.housers.com/assets/images/how-it-works/paso4-2.gif" class="img-responsive">
	    			<br>
	    		</a>
          <p class="parrafo-dos">
	    			<strong>Inversión</strong>
	    			<br>
	    			Inversión en rehabilitación o construcción de inmuebles para su venta
          </p>
	    	</div>
	    	<div class="col-4 caja-texto-tres" align="center">
	    		<a>
		    		<img id="paso4-3" data-src="https://static.housers.com/assets/images/how-it-works/paso4-3.gif" src="https://static.housers.com/assets/images/how-it-works/paso4-3.gif" class="img-responsive"><br>
		    	</a>
          <p class="parrafo-dos">
		    		<strong>Tipo Fijo</strong>
		    		<br>
		    		Inversión en préstamos a promotores para obra nueva
          </p>
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
      <div class="col-2 text-center full d-inline-flex justify-content-center align-items-center quinta-seccion seccion-cinco">
        <div class="circle font-weight-bold circulo-cinco">5</div>
      </div>
      <div class="col-6 gestiona">
        <h5 class="titulo-gestiona">Gestiona y saca el máximo partido a tus inversiones </h5>
        <br>
        <p class="parrafo-cinco"><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </strong></p>
        <a href="{{ asset('registro') }}" class="btn btn-danger boton-cinco"><small>REGISTRATE GRATIS</small></a>
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
        <h5 class="circulo-h-info"> Información básica para el inversor </h5>
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
          <br>

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
          <br>

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
          <br>
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
								<div class="col-lg-3" align="center">
									<a>
										<img class="img-responsive center-img" src="https://static.housers.com/assets/images/how-it-works/housers-informe-espana-es.svg" alt="Evolución del Mercado Inmobiliario en España">
										<h5>Evolución del Mercado Inmobiliario en España</h5>
									</a>
								</div>
								<div class="col-lg-3" align="center">
									<a>
										<img class="img-responsive center-img" src="https://static.housers.com/assets/images/how-it-works/housers-informe-italia-es.svg" alt="Evolución del Mercado Inmobiliario en Italia">
										<h5>Evolución del Mercado Inmobiliario en Italia</h5>
									</a>
								</div>
								<div class="col-lg-3" align="center">
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