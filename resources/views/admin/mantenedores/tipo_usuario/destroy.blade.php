{!! Form::open(['route'=>['mantenedor-tipos_usuarios.delete',$tipoUsuario->idTipoUsuario],'method'=>'delete']) !!}
	<button class="dropdown-item btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar el Registro ?')">Eliminar</button>
{!! Form::close() !!}
