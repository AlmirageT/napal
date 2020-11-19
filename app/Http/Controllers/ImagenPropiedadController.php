<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImagenPropiedad;
use Image;

class ImagenPropiedadController extends Controller
{
    public function index($idPropiedad)
    {
    	return view('admin.propiedades.imagenesPropiedades',compact('idPropiedad'));
    }
    public function dropzone(Request $request,$idPropiedad)
    {
        if($request->file('file')){

            $imagen = $request->file('file');
			$img = Image::make($imagen);

            $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
			$img->resize(730, 486, function ($constraint) {
				$constraint->aspectRatio();
				$constraint->upsize();
			});
            $img->save('img/fotosPropiedades/'.$imgName);
            //imagen pequeña
            $imagenDos = $request->file('file');
            $imgDos = Image::make($imagenDos);
            $imgNameDos = uniqid().'.'.$imagen->getClientOriginalExtension();
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
