{!! Form::open(['route'=>['mantenedor-propiedades.delete',$propiedad->idPropiedad],'method'=>'delete']) !!}
	<button class="btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar el Registro ?')">Eliminar</button>
{!! Form::close() !!}
