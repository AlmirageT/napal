{!! Form::open(['route'=>['mantenedor-parametros-generales.delete',$parametroGeneral->idParametroGeneral],'method'=>'delete']) !!}
	<button class="dropdown-item btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar el Registro ?')">Eliminar</button>
{!! Form::close() !!}
