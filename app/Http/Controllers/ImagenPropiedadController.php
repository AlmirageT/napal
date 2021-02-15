<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImagenPropiedad;
use App\Propiedad;
use Image;
use Session;

class ImagenPropiedadController extends Controller
{
    public function index($idPropiedad)
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        if (Session::has('idTipoUsuario')) {
            if (Session::get('idTipoUsuario') != 3 && Session::get('idTipoUsuario') != 10) {
                return abort(401);
            }
        }
    	return view('admin.propiedades.imagenesPropiedades',compact('idPropiedad'));
    }
    public function dropzone(Request $request,$idPropiedad)
    {
        $propiedad = Propiedad::select('*')
        ->join('regiones','propiedades.idRegion','=','regiones.idRegion')
        ->join('comunas','propiedades.idComuna','=','comunas.idComuna')
        ->where('propiedades.idPropiedad',$idPropiedad)
        ->firstOrFail();
        $direccionMinuscula = strtolower($propiedad->direccion1);
        $direccionGuion = str_replace(" ", "-", $direccionMinuscula);

        $comunaMinuscula = strtolower($propiedad->nombreComuna);
        $comunaGuion = str_replace(" ", "-", $comunaMinuscula);

        $regionMinuscula = strtolower($propiedad->nombreRegion);
        $regionGuion = str_replace(" ", "-", $regionMinuscula);

        if($request->file('file')){

            $imagen = $request->file('file');
			$img = Image::make($imagen);

            $imgName = uniqid().'-'.$direccionGuion.'-'.$comunaGuion.'-'.$regionGuion.'.'.$imagen->getClientOriginalExtension();
			$img->resize(730, 486, function ($constraint) {
				$constraint->aspectRatio();
				$constraint->upsize();
			});
            $img->save('img/fotosPropiedades/'.$imgName);
            //imagen pequeña
            $imagenDos = $request->file('file');
            $imgDos = Image::make($imagenDos);
            $imgNameDos = uniqid().'-'.$direccionGuion.'-'.$comunaGuion.'-'.$regionGuion.'.'.$imagen->getClientOriginalExtension();
            $imgDos->resize(146, 97, function ($constraint) {
				$constraint->aspectRatio();
				$constraint->upsize();
			});
            $imgDos->save('img/fotosPropiedades/'.$imgNameDos);
			//$img->insert(public_path() . '/img/logos/marca_de_agua_atotal.png', 'center');
            ImagenPropiedad::create([
                'imagenPropiedadGrande' => 'img/fotosPropiedades/'.$imgName,
		    	'imagenPropiedadPequeña' => 'img/fotosPropiedades/'.$imgNameDos,
		    	'idPropiedad' => $idPropiedad
            ]);
            return response()->json("Exito");
        }
        return response()->json("fallo");
    }
}
