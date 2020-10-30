{!! Form::open(['route'=>['mantenedor-casos-exitosos.delete',$casoExitoso->idCasoExitoso],'method'=>'delete']) !!}
	<button class="dropdown-item btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar el Registro ?')">Eliminar</button>
{!! Form::close() !!}
