@extends('layouts.public.app')
@section('title','Invita a un amigo')
@section('content')
<style type="text/css">
	.card{
		box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
	}
	.cropped {
	    width: 100%;
		height: auto;
		overflow: hidden;
	}
	.cropped img {
	    margin: -15px 0px 0px -60px;
	    top: -93px;
	    position: relative;
	}
	.h1{
		color: white;
		margin-right: -93px;
		margin-top: -640px;
		font-size: 474%;
	}
	.h4{
		color: white;
		margin-right: -87px;
	}
	.botones{
		margin-top: 78px;
		margin-right: 44px;
	}
	.amarillo{
		margin-left: 525px;
		margin-top: 15px;
		padding-left: 40px;
		padding-right: 40px;
		background-color: #fcd800;
		border-radius: 50px;
		color: #fff;
		font-size: 20px;
		padding: 15px 40px;
	    padding-right: 40px;
	    padding-left: 40px;
		padding-right: 40px;
		padding-left: 40px;
		text-align: center;
		align-self: flex-start;
		float: left;
		border-bottom: 0;
		margin: none;
		margin-top: 30px;
	}
	.luz{
		margin-top: 30px;
		margin-right: -62px;
		background-color: transparent;
		border: 3px solid #fff;
		color: #fff;
		float: right;
		padding: 12px 40px;
		border-radius: 50px;
		font-size: 18px;
	}
	.parrafo{
		font-size: 122%;
		line-height: 46px;
	}
	.invitacion{
		margin-top: 25px;
	}
	.aviso{
		margin-top: 15px;
		padding-left: 40px;
		padding-right: 40px;
		background-color: #fcd800;
		border-radius: 50px;
		color: #fff;
		font-size: 20px;
		padding: 12px 40px;
	    padding-right: 40px;
	    padding-left: 40px;
		padding-right: 40px;
		padding-left: 40px;
		text-align: center;
		align-self: flex-start;
		float: left;
		border-bottom: 0;
		margin: none;
		margin-top: 30px;
	}
	.aviso-luz{
		float: right;
		background-color: transparent;
		border: 3px solid #fcd800;
		color: #fcd800;
		padding: 12px 40px;
	    padding-right: 40px;
	    padding-left: 40px;
		border-radius: 50px;
		margin-top: 30px;
		padding-right: 40px;
		padding-left: 40px;
		font-size: 19px;
	}
	@media only screen and (min-width:320px) and (max-width: 382px) {
		.img-container-friend{
			height: 445px;
		}
		.h1{
			font-size: 33px;
			margin-top: -72px;
			margin-right: 4px;
			margin-left: -18px;
		}
		.h4{
			font-size: 19px;
			margin-right: 17px;
		}
		.amarillo{
			margin-left: 60px;
			margin-top: -26px;
		}
		.luz{
			margin-right: -4px;
		}
		.card{
			box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
			margin-top: 38px;
		}
		.aviso{
			margin-left: 32px;
		}
		.aviso-luz{
			margin-right: 21px;
		}
		.centered-img{
			height: 445px;
		}
	}
	@media only screen and (min-width:383px) and (max-width: 390px) {
		.img-container-friend{
			height: 445px;
		}
		.h1{
			font-size: 33px;
			margin-top: -72px;
			margin-right: 4px;
			margin-left: -18px;
		}
		.h4{
			font-size: 19px;
			margin-right: 17px;
		}
		.amarillo{
			margin-left: 67px;
			margin-top: -26px;
		}
		.luz{
			margin-right: -4px;
		}
		.card{
			box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
			margin-top: 38px;
		}
		.aviso{
			margin-left: 44px;
		}
		.aviso-luz{
			margin-right: 21px;
		}
		.centered-img{
			height: 445px;
		}
	}
	@media only screen and (min-width:391px) and (max-width: 440px) {
		.img-container-friend{
			height: 445px;
		}
		.h1{
			font-size: 33px;
			margin-top: -72px;
			margin-right: 4px;
			margin-left: -18px;
		}
		.h4{
			font-size: 19px;
			margin-right: 17px;
		}
		.amarillo{
			margin-left: 67px;
			margin-top: -26px;
		}
		.luz{
			margin-right: 35px;
		}
		.card{
			box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
			margin-top: 38px;
		}
		.aviso{
			margin-left: 44px;
		}
		.aviso-luz{
			margin-right: 54px;
		}
		.centered-img{
			height: 445px;
		}
	}
	@media only screen and (min-width:441px) and (max-width: 455px) {
		.img-container-friend{
			height: 445px;
		}
		.h1{
			font-size: 33px;
			margin-top: -72px;
			margin-right: 4px;
			margin-left: -18px;
		}
		.h4{
			font-size: 19px;
			margin-right: 17px;
		}
		.amarillo{
			margin-left: 93px;
			margin-top: -26px;
		}
		.luz{
			margin-right: 35px;
		}
		.card{
			box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
			margin-top: 38px;
		}
		.aviso{
			margin-left: 66px;
		}
		.aviso-luz{
			margin-right: 54px;
		}
		.centered-img{
			height: 504px;
		}
	}
	@media only screen and (min-width:456px) and (max-width: 475px) {
		.img-container-friend{
			height: 445px;
		}
		.h1{
			font-size: 33px;
			margin-top: -72px;
			margin-right: 4px;
			margin-left: -18px;
		}
		.h4{
			font-size: 19px;
			margin-right: 17px;
		}
		.amarillo{
			margin-left: 104px;
			margin-top: -26px;
		}
		.luz{
			margin-right: 35px;
		}
		.card{
			box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
			margin-top: 38px;
		}
		.aviso{
			margin-left: 86px;
		}
		.aviso-luz{
			margin-right: 54px;
		}
		.centered-img{
			height: 504px;
		}
	}
	@media only screen and (min-width:476px) and (max-width: 500px) {
		.img-container-friend{
			height: 445px;
		}
		.h1{
			font-size: 33px;
			margin-top: -72px;
			margin-right: 4px;
			margin-left: -18px;
		}
		.h4{
			font-size: 19px;
			margin-right: 17px;
		}
		.amarillo{
			margin-left: 104px;
			margin-top: -26px;
		}
		.luz{
			margin-right: 67px;
		}
		.card{
			box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
			margin-top: 38px;
		}
		.aviso{
			margin-left: 86px;
		}
		.aviso-luz{
			margin-right: 77px;
		}
		.centered-img{
			height: 504px;
		}
	}
	@media only screen and (min-width:501px) and (max-width: 520px) {
		.img-container-friend{
			height: 445px;
		}
		.h1{
			font-size: 33px;
			margin-top: -72px;
			margin-right: 4px;
			margin-left: -18px;
		}
		.h4{
			font-size: 19px;
			margin-right: 17px;
		}
		.amarillo{
			margin-left: 130px;
			margin-top: -26px;
		}
		.luz{
			margin-right: 67px;
		}
		.card{
			box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
			margin-top: 38px;
		}
		.aviso{
			margin-left: 111px;
		}
		.aviso-luz{
			margin-right: 77px;
		}
		.centered-img{
			height: 504px;
		}
	}
	@media only screen and (min-width:521px) and (max-width: 550px) {
		.img-container-friend{
			height: 445px;
		}
		.h1{
			font-size: 33px;
			margin-top: -72px;
			margin-right: 4px;
			margin-left: -18px;
		}
		.h4{
			font-size: 19px;
			margin-right: 17px;
		}
		.amarillo{
			margin-left: 154px;
			margin-top: -26px;
		}
		.luz{
			margin-right: 67px;
		}
		.card{
			box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
			margin-top: 38px;
		}
		.aviso{
			margin-left: 132px;
		}
		.aviso-luz{
			margin-right: 77px;
		}
		.centered-img{
			height: 504px;
		}
	}
	@media only screen and (min-width:551px) and (max-width: 580px) {
		.img-container-friend{
			height: 445px;
		}
		.h1{
			font-size: 33px;
			margin-top: -72px;
			margin-right: 4px;
			margin-left: -18px;
		}
		.h4{
			font-size: 19px;
			margin-right: 17px;
		}
		.amarillo{
			margin-left: 163px;
			margin-top: -26px;
		}
		.luz{
			margin-right: 92px;
		}
		.card{
			box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
			margin-top: 38px;
		}
		.aviso{
			margin-left: 132px;
		}
		.aviso-luz{
			margin-right: 134px;
		}
		.centered-img{
			height: 504px;
		}
	}
	@media only screen and (min-width:581px) and (max-width: 767px) {
		.img-container-friend{
			height: 445px;
		}
		.h1{
			font-size: 33px;
			margin-top: -72px;
			margin-right: 4px;
			margin-left: -18px;
		}
		.h4{
			font-size: 19px;
			margin-right: 17px;
		}
		.amarillo{
			margin-left: 127px;
			margin-top: -26px;
		}
		.luz{
			margin-right: 92px;
		}
		.card{
			box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
			margin-top: 38px;
		}
		.aviso{
			margin-left: 132px;
		}
		.aviso-luz{
			margin-right: 88px;
		}
		.centered-img{
			height: 504px;
		}
	}
	@media only screen and (min-width:768px) and (max-width: 991px) {
		.img-container-friend{
			height: 445px;
		}
		.h1{
			font-size: 33px;
			margin-top: -410px;
			margin-right: 4px;
			margin-left: -18px;
		}
		.h4{
			width: 357px;
			font-size: 17px;
			margin-right: 0px;
		}
		.amarillo{
			margin-left: 406px;
			margin-top: -26px;
		}
		.luz{
			margin-right: -4px;
		}
		.card{
			box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
			margin-top: 38px;
		}
		.aviso{
			margin-left: 177px;
		}
		.aviso-luz{
			margin-right: 229px;
		}
		.centered-img{
			height: 616px;
		}
	}
	@media only screen and (min-width:992px) and (max-width: 1199px) {
		.img-container-friend{
			height: 626px;
		}
		.h1{
			font-size: 33px;
			margin-top: -547px;
			margin-right: 113px;
		}
		.h4{
			width: 357px;
			font-size: 17px;
			margin-right: 101px;
		}
		.amarillo{
			margin-left: 594px;
			margin-top: -26px;
		}
		.luz{
			margin-right: 52px;
		}
		.card{
			box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
			margin-top: 38px;
		}
		.aviso{
			margin-left: -7px;
			margin-top: 15px;
			padding-left: 40px;
			padding-right: 40px;
			background-color: #fcd800;
			border-radius: 50px;
			color: #fff;
			font-size: 15px;
			padding: 12px 40px;
		    padding-right: 40px;
		    padding-left: 40px;
			padding-right: 40px;
			padding-left: 40px;
			padding-right: 40px;
			padding-left: 40px;
			text-align: center;
			align-self: flex-start;
			float: left;
			border-bottom: 0;
			margin: none;
			margin-top: 30px;
		}
		.aviso-luz{
			margin-right: 15px;
			float: right;
			background-color: transparent;
			border: 3px solid #fcd800;
			color: #fcd800;
			padding: 12px 40px;
		    padding-right: 40px;
		    padding-left: 40px;
			padding-right: 40px;
			padding-left: 40px;
			border-radius: 50px;
			margin-top: 30px;
			padding-right: 40px;
			padding-left: 40px;
			font-size: 13px;
		}
		.centered-img{
			height: 616px;
		}
	}
	@media only screen and (min-width:1200px) and (max-width: 1333px) {
		.img-container-friend{
			height: 626px;
		}
		.h1{
			font-size: 33px;
			margin-top: -547px;
			margin-right: 113px;
		}
		.h4{
			width: 357px;
			font-size: 17px;
			margin-right: 101px;
		}
		.amarillo{
			margin-left: 771px;
			margin-top: -26px;
		}
		.luz{
			margin-right: 52px;
		}
		.card{
			box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
			margin-top: 38px;
		}
		.aviso{
			margin-left: -7px;
			margin-top: 15px;
			padding-left: 40px;
			padding-right: 40px;
			background-color: #fcd800;
			border-radius: 50px;
			color: #fff;
			font-size: 15px;
			padding: 12px 40px;
		    padding-right: 40px;
		    padding-left: 40px;
			padding-right: 40px;
			padding-left: 40px;
			padding-right: 40px;
			padding-left: 40px;
			text-align: center;
			align-self: flex-start;
			float: left;
			border-bottom: 0;
			margin: none;
			margin-top: 30px;
		}
		.aviso-luz{
			margin-right: 15px;
			float: right;
			background-color: transparent;
			border: 3px solid #fcd800;
			color: #fcd800;
			padding: 12px 40px;
		    padding-right: 40px;
		    padding-left: 40px;
			padding-right: 40px;
			padding-left: 40px;
			border-radius: 50px;
			margin-top: 30px;
			padding-right: 40px;
			padding-left: 40px;
			font-size: 13px;
		}
		.centered-img{
			height: 616px;
		}
	}
</style>
<div style="background: linear-gradient(45deg,rgba(49,137,175,1) 0,rgba(49,137,175,1) 34%,rgba(88,231,228,1) 100%);">
	<div class="cropped">
		<img src="https://www.housers.com/assets/images/promo-friend/housers-promo-amigo-1.png" class="img-responsive img-container-friend">
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12" align="right">
				<h1 class="h1">¡Quien tiene un amigo <br> tiene un tesoro!</h1>
				<h4 class="h4">25€ para ti y 25€ para tu amigo que invierte con Housers</h4>
				<div class="botones">
					<a href="" class="amarillo">INVITAR VIA LINK</a> <a href="" class="luz">INVITAR VIA E-MAIL</a>
				</div>
				<br>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-6" align="center">
								<img src="https://www.housers.com/assets/images/promo-friend/housers-h-humana.png" alt="¡Quien tiene un amigo<br>tiene un tesoro!" class="img-responsive centered-img">
							</div>
							<div class="col-lg-6">
								<img src="https://www.housers.com/assets/images/promo-friend/housers-personas-1.png" alt="¡Quien tiene un amigo<br>tiene un tesoro!" class="img-responsive hidden-xs"> 
								<h2><br>¡Gracias por hacernos crecer!</h2>
								<br>
								<p class="parrafo">Tu confianza tiene recompensa. <br>Invita a tantos amigos como quieras a formar parte de la <br> comunidad Housers y os beneficiáis los dos, 25€ <br> para ti y 25€ para tu amigo. <br>¿A qué esperas?</p>
								<img src="https://www.housers.com/assets/images/promo-friend/housers-personas-2.png" alt="¡Quien tiene un amigo<br>tiene un tesoro!" class="img-responsive hidden-xs">
								<div class="invitacion">
									<a href="" class="aviso">INVITAR VIA LINK</a> <a href="" class="aviso-luz">INVITAR VIA E-MAIL</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<p style="color: white">*La promoción es acumulable con otras promociones. <br>
					Sin código, accediendo a través de la invitación. La cantidad de dinero entregada por esta promoción solo puede ser usada para invertir en Housers y en ningún caso podrá ser retirada. Solo aplica para inversiones en oportunidades en fase de financiación. La promoción se hará efectiva el último día del mes siguiente al del cierre del objetivo de financiación del proyecto en el que el invitado haya efectuado la primera inversión y deberá ser utilizada/canjeada en el plazo máximo de 3 meses desde el abono de la misma en el wallet. 
				</p>
			</div>
		</div>
		<br>
		<br>
	</div>
</div>
@endsection