{!! Form::open(['route'=>['mantenedor-proyectos.delete',$proyecto->idProyecto],'method'=>'delete']) !!}
	<button class="dropdown-item btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar el Registro ?')">Eliminar</button>
{!! Form::close() !!}
