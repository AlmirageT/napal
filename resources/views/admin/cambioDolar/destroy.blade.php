{!! Form::open(['route'=>['mantenedor-cambio-dolar.delete',$cambioDolar->idCambioDolar],'method'=>'delete']) !!}
	<button class="dropdown-item btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar el Registro ?')">Eliminar</button>
{!! Form::close() !!}
