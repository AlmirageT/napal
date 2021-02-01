@extends('layouts.public.app')
@section('title')
Retiros
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12" align="center">
			<h4>Retirar fondos</h4>
			<br>
		</div>
		<div class="col-lg-12">
			<p>Puedes retirar fondos de tu cuenta Housers a tu cuenta bancaria facilitada siempre y cuando esta última esté validada en la pestaña "Tus cuentas bancarias".<br>La cantidad máxima que puedes transferir es de: 90,00 €. Utiliza la "," solo para decimales.</p>
		</div>
		<div class="col-lg-12">
			{!!Form::open(['route' => 'mantenedor-retiro.store', 'method' => 'POST','files'=>true])!!}
        		@csrf
				<div class="card" style="box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);">
					<div class="card-body">
						<div class="row">
							@if (count($arrayOptBanco)>0)
								<div class="col-lg-3">
									<div class="form-group">
										<label>Cuenta bancaria</label>
										<select class="form-control"  name="idCuentaBancariaUsuario" required>
											<option value="">Seleccione Cuenta</option>
											@foreach ($arrayOptBanco as $banco)
												<optgroup label="{{ $banco['banco'] }}"></optgroup>
												@foreach ($banco['tipoCuentas'] as $tipoCuenta)
													<option value="{{ $tipoCuenta['idCuentaBancariaUsuario'] }}">{{ $tipoCuenta['nombreTipoCuenta'] }} - {{ $tipoCuenta['numeroCuenta'] }}</option>
												@endforeach
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
										<label>Concepto</label>
										<input type="text" name="concepto" class="form-control" required="">
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
										<label>Importe</label>
										<div class="input-group mb-2">
											<div class="input-group-prepend">
												<div class="input-group-text">$</div>
											</div>
											<input type="text" class="form-control" id="inlineFormInputGroup" name="importe" placeholder="{{ number_format($valorInicio->valorParametroGeneral,0,',','.') }}" maxlength="8" onkeyup="format(this)" onchange="format(this)" required>
										</div>
									</div>
								</div>
								<div class="col-lg-3" align="right" style="margin-top: 30px">
									<button class="btn btn-primary" type="submit"><small>SOLICITAR TRANSFERENCIA</small></button>
								</div>
							@else
								<div class="col-lg-12">
									<div class="form-group" align="center">
										<h4>No posee ninguna cuenta asociada</h4>
										<br>
										<a href="{{ asset('dashboard/mi-cuenta/cuentas-bancarias/nueva') }}" class="btn btn-danger">Click aqui para agregar cuenta</a>
									</div>
								</div>
							@endif
								
						</div>
					</div>
				</div>
				<br>
	        {!!Form::close()!!}
		</div>
	</div>
</div>
@endsection
<script type="text/javascript">
    function format(input)
    {
        var num = input.value.replace(/\./g,'');
        if(!isNaN(num)){
            num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
            num = num.split('').reverse().join('').replace(/^[\.]/,'');
            input.value = num;
        }else{ 
            alert('Solo se permiten numeros');
            input.value = input.value.replace(/[^\d\.]*/g,'');
        }
    }
</script>