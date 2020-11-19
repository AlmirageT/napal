{!! Form::open(['route'=>['mantenedor-monedas.delete',$moneda->idMoneda],'method'=>'delete']) !!}
	<button class="dropdown-item btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar el Registro ?')">Eliminar</button>
{!! Form::close() !!}
