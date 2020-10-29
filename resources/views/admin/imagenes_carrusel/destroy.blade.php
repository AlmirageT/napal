{!! Form::open(['route'=>['mantenedor-carrusel.delete',$imagenCarrusel->idImagenCarrusel],'method'=>'delete','files'=>true]) !!}
	<button class="dropdown-item btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar el Registro ?')">Eliminar</button>
{!! Form::close() !!}
