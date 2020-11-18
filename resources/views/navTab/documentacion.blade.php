<div class="card-body pt-8 p-md-10 p-5">
	<p style="color: black">Documentos financieros</p>
	<div class="row">
		@if(count($documentos)>0)
			@foreach($documentos as $documento)
				<div class="col-lg-6">
					<a target="_blank" href="{{ asset('ver-documento') }}/{{ $documento->idDocumento }}" style="color: blue"><small>{{ $documento->nombreDocumento }}</small></a>
				</div>
			@endforeach
		@else
			<div class="col-lg-6">
				<a href="" style="color: blue"><small>Aqui unos documentos</small></a>
			</div>

			<div class="col-lg-6">
				<a href="" style="color: blue"><small>Aqui otros</small></a>
			</div>
		@endif
	</div>
	<br>
	<p style="color: black">Documentos de la oportunidad</p>
	<div class="row">
		<div class="col-lg-6">
			<a href="" style="color: blue"><small>documentos por aqui</small></a>
		</div>
		<div class="col-lg-6">
			<a href="" style="color: blue"><small>documentos por aca</small></a>
		</div>
	</div>
	<br>

	<p style="color: black">Documentos legales</p>
	<div class="row">
		<div class="col-lg-6">
			<a href="" style="color: blue"><small>Otros</small></a>
		</div>
		<div class="col-lg-6">
			<a href="" style="color: blue"><small>Otras</small></a>
		</div>
	</div>
</div>
