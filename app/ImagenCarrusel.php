<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenCarrusel extends Model
{
    protected $table = 'imagenes_carruseles';
    protected $primaryKey = 'idImagenCarrusel';
    protected $fillable = [
    	'rutaImagenCarrusel',
    	'activoImagenCarrusel',
    	'idTipoImagen'
    ];
}
