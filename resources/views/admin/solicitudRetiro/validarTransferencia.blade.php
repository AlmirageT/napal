@extends('layouts.admin.app')
@section('title','Validar Transferencia')
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Validar Transferencia</h3> 
	</div>
</div>
	<br>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Concepto</label>
							<input type="text" disabled class="form-control" value="{{ $instruccionBancaria->concepto }}">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Importe</label>
							<input type="text" disabled class="form-control" value="{{ number_format($instruccionBancaria->importe,0,',','.') }}">
						</div>
					</div>
				</div>
			</div>
			<form action="{{ asset('napalm/validar/transferencia') }}/{{ $instruccionBancaria->idIntruccionBancaria }}" method="post">
				@csrf
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label>Comprobante de Transferencia</label>
								<input type="file" required name="comprobanteBancario" class="form-control" onchange="onFileSelected(event)">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<img id="myimage" height="200">
							</div>					
						</div>
						<div class="col-lg-12" align="center">
							<button class="btn btn-primary">Validar</button>
						</div>
					</div>
				</div>
			</form>

		</div>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	function onFileSelected(event) {
	  var selectedFile = event.target.files[0];
	  var reader = new FileReader();

	  var imgtag = document.getElementById("myimage");
	  imgtag.title = selectedFile.name;

	  reader.onload = function(event) {
	    imgtag.src = event.target.result;
	  };

	  reader.readAsDataURL(selectedFile);
	}
</script>
@endsection