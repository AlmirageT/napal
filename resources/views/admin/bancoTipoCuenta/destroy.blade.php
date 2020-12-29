{!! Form::open(['route'=>['mantenedor-banco-tipo-cuenta.delete',$bancoTipoCuenta->idBancoTipoCuenta],'method'=>'delete']) !!}
	<button class="dropdown-item btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar el Registro ?')">Eliminar</button>
{!! Form::close() !!}
