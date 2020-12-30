<div class="card-body pt-8 p-md-10 p-5">
	<p style="color: black">Documentos financieros</p>
	<div class="row">
		@if(count($documentos)>0)
			@foreach($documentos->where('idTipoDocumento',1) as $documento)
				<div class="col-lg-6">
					<a target="_blank" href="{{ asset('ver-documento') }}/{{ $documento->idDocumento }}" style="color: blue"><small>{{ $documento->nombreDocumento }}</small></a>
				</div>
			@endforeach
		@else
			no hay documentos
		@endif
	</div>
	<br>
	<p style="color: black">Documentos de la oportunidad</p>
	<div class="row">
		@if(count($documentos)>0)
			@foreach($documentos->where('idTipoDocumento',2) as $documento)
				<div class="col-lg-6">
					<a target="_blank" href="{{ asset('ver-documento') }}/{{ $documento->idDocumento }}" style="color: blue"><small>{{ $documento->nombreDocumento }}</small></a>
				</div>
			@endforeach
		@else
			no hay documentos
		@endif
	</div>
	<br>

	<p style="color: black">Documentos legales</p>
	<div class="row">
		@if(count($documentos)>0)
			@foreach($documentos->where('idTipoDocumento',3) as $documento)
				<div class="col-lg-6">
					<a target="_blank" href="{{ asset('ver-documento') }}/{{ $documento->idDocumento }}" style="color: blue"><small>{{ $documento->nombreDocumento }}</small></a>
				</div>
			@endforeach
		@else
			no hay documentos
		@endif
	</div>
</div>
