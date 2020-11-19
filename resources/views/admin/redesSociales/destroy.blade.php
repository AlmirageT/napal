{!! Form::open(['route'=>['mantenedor-redes-sociales.delete',$redSocial->idRedSocial],'method'=>'delete']) !!}
	<button class="dropdown-item btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar el Registro ?')">Eliminar</button>
{!! Form::close() !!}
