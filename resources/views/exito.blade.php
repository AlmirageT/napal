@extends('layouts.public.app')
@section('title')
Confirmar Inversion
@endsection
@section('content')
<div class="container">
	<div align="center">
		<h3>INVERSIÓN CONFIRMADA</h3>
		<br>
		<br>
		<h3>{{ $propiedadesInversion->nombrePropiedad }}</h3>
		<h3>Tu inversion se ha realizado correctamente</h3>
		<p>Puedes seguir la evolución del proyecto a través de la ficha del mismo o en tu área de usuario</p>
		<p>Muchas gracias por confiar en nosotros. Es un auténtico placer para nosotros poder acompañarte en todo este proceso. Nos gustaria saber tu opinión ¿Tienes un minuto?</p>
		<br>
		<a class="btn btn-danger" href="{{ $redesSociales->where('nombreRedSocial','Facebook')->pluck('rutaRedSocial')->first() }}" target="_blank">Redes Sociales</a>
		<br>
		<br>
	</div>
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-lg-6">
					<div class="row">
						<div class="col-lg-12" >
							<p>CARACTERISTICAS DEL PROYECTO</p>
						</div>
						<div class="col-lg-6">
							<hr>
								<p>Tipología de Préstamo</p>
							<hr>
						</div>
						<div class="col-lg-6" align="right">
							<hr>
								<p>{{ $propiedadesInversion->nombreTipoFlexibilidad }}</p>
							<hr>
						</div>
						<div class="col-lg-6">
							<hr>
								<p>Objetivo de financiación</p>
							<hr>
						</div>
						<div class="col-lg-6" align="right">
							<hr>
								<p>${{ number_format($propiedadesInversion->precio,0,',','.') }}</p>
							<hr>
						</div>
						<div class="col-lg-6">
							<hr>
								<p>Cantidad financiada hasta la fecha</p>
							<hr>
						</div>
						<div class="col-lg-6" align="right">
							<hr>
								<p>${{ number_format($suma,0,',','.') }}</p>
								<p>({{ round($porcentaje) }}%)</p>
							<hr>
						</div>
						<div class="col-lg-6">
							<hr>
								<p>Plazo restante financiación</p>
							<hr>
						</div>
						<div class="col-lg-6" align="right">
							<hr>
								<p>{!! $diff->days !!} dias</p>
							<hr>
						</div>
						<div class="col-lg-6">
							<hr>
								<p>Duración de prestamo</p>
							<hr>
						</div>
						<div class="col-lg-6" align="right">
							<hr>
								<p>{{ $propiedadesInversion->plazoMeses }} meses</p>
							<hr>
						</div>
						<div class="col-lg-6">
							<hr>
								<p>Interés anual del préstamo</p>
							<hr>
						</div>
						<div class="col-lg-6" align="right">
							<hr>
								<p>{{ $propiedadesInversion->rentabilidadAnual }}%</p>
							<hr>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="row">
						<div class="col-lg-12">
							<p>DETALLES DE LA OPERACIÓN</p>
						</div>
						<div class="col-lg-6">
							<hr>
								<p>Cantidad invertida</p>
							<hr>
						</div>
						<div class="col-lg-6" align="right">
							<hr>
								<p>${{ number_format($inversion,0,',','.') }}</p>
							<hr>
						</div>
						<div class="col-lg-6">
							<hr>
								<p>Fecha</p>
							<hr>
						</div>
						<div class="col-lg-6" align="right">
							<hr>
								<p>{{ date('d-m-Y') }}</p>
							<hr>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
</div>

@endsection