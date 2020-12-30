@extends('layouts.public.app')
@section('title')
Confirmar Inversion
@endsection
@section('content')
<style>
    .contenedor-datos {
        width: 100%;
    }
    
    .box{
        width: 100%;
        height: 150px;
        border: 1px solid grey;
        display: flex;
        justify-content: space-between;
    }
    
   .datos{
        margin: auto;
        width: 44%;
        height: 120px;
        border: 1px solid grey;
        border-bottom: none;
        border-top: none;
        border-right: none;
        text-align: center;
        color: grey;
    }
    
    .datos1{
        margin: auto;
        width: 40%;
        height: 120px;
        border: 1px solid grey;
        border-bottom: none;
        border-top: none;
        border-right: none;
        border-left: none;
        text-align: center;
        color: grey;
    }
    
</style>
<div class="container">
	<form action="{{ asset('verificacion-pago') }}" method="POST">
	@csrf
		<div class="card">
			<div class="card-header" align="center">
				<h3>{{ $propiedad->nombrePropiedad }}</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-6">
						<div class="row">
							<div class="col-lg-12" align="center">
								<h3><small>DESGLOSE DE TU INVERSIÓN</small></h3>
							</div>
							<div class="col-lg-12">
							<br>
							<br>
								<div class="contenedor-datos">
							        <div class="box">
							           <div class="datos1">
							               <p>CAPITAL INVERTIDO</p>
							               <h3>${{ number_format($sinCaracteres,0,',','.') }}</h3>
							           </div>
							           
							            <div class="datos">
							               <p>N° FRACCIONES</p>
							               <h3>${{ number_format($sinCaracteres,0,',','.') }}</h3>
							               <input type="hidden" name="saldo" value="{{ $sinCaracteres }}">
							            </div>
							        </div>
							    </div>
							    <br>
							    <br>
							    <br>
							</div>
							<div class="col-lg-12">
								<div class="contenedor-datos">
							        <div class="box">
							           <div class="datos1">
							               <p>Rentabilidad Anual</p>
							               <h3>{{ $propiedad->rentabilidadAnual }}%</h3>
							           </div>
							           
							            <div class="datos">
							               <p>Rentabilidad Total</p>
							               <h3>{{ $propiedad->rentabilidadTotal }}%</h3>
							            </div>
							            <div class="datos">
							               <p>Plazo</p>
							               <h3>{{ $propiedad->plazoMeses }} Meses</h3>
							             </div>
							        </div>
							    </div>
							</div>
					    </div>
					</div>	
					<div class="col-lg-6">
						<div class="row">
							<div class="col-lg-12" align="center">
								<h3><small>FORMA DE PAGO</small></h3>
							</div>
							<div class="col-lg-12">
							<br>
							<br>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
								  <label class="form-check-label" for="exampleRadios1">
								    Tarjeta Bancaria
								  </label>
								  <p>Cantidad maxima $2.000.000</p>
								</div>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
								  <label class="form-check-label" for="exampleRadios2">
								    Con tu cuenta NAPALM
								  </label>
								  <p>Saldo disponible: 
								  	@if (count($saldoDisponible)>0)
								  		${{ number_format($saldoDisponible->first()->cantidadSaldoDisponible) }}
								  	@else
								  		$0
								  	@endif
								  </p>
								</div>
							<hr>
							</div>
							<div class="col-lg-12">
								<div id="accordion">
							  		<div class="card">
								    	<div class="card-header" id="headingTwo">
								      		<h5 class="mb-0">
								        		<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								          			¿Tienes un código promocional?
								        		</button>
								      		</h5>
								    	</div>
								    	<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								      		<div class="card-body">
								      			<div class="form-group">
								      				<label>Código</label>
								        			<input type="text" name="codigoPromocional" class="form-control">
								      			</div>
								      		</div>
								    	</div>
								    </div>
							  	</div>
							<hr>
							</div>
		                    <div class="col-lg-12 form-group">
		                        <div class="input-group mb-3">
		                            <div class="input-group-prepend">
		                            	<input type="checkbox" id="condiciones" name="condiciones" required> &nbsp;&nbsp;
		                                <label for="">Acepto las <a style="color: blue">condiciones de servicios</a> de NAPALM y los terminos y condiciones de ISBAST</label>
		                            </div>
		                        </div>
		                    </div>
		                    <button class="btn btn-primary btn-block">
		                    	Confirmar Inversión
		                    </button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
	</form>
</div>
@endsection