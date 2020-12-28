{!! Form::open(['route'=>['mantenedor-tipo-cuenta.delete',$tipoCuenta->idTipoCuenta],'method'=>'delete']) !!}
	<button class="dropdown-item btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar el Registro ?')">Eliminar</button>
{!! Form::close() !!}
