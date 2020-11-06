<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FotoPlano;
use Image;

class FotoPlanoController extends Controller
{
    public function index($idPropiedad)
    {
    	return view('admin.propiedades.planos',compact('idPropiedad'));
    }
    public function dropzone(Request $request,$idPropiedad)
    {
        if($request->file('file')){

            $imagen = $request->file('file');
			$img = Image::make($imagen);

            $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
			$img->resize(730, 370, function ($constraint) {
				$constraint->aspectRatio();
				$constraint->upsize();
			});
            $img->save('img/fotosPropiedades/'.$imgName);
			//$img->insert(public_path() . '/img/logos/marca_de_agua_atotal.png', 'center');
            FotoPlano::create([
                'fotoPlano' => 'img/fotosPropiedades/'.$imgName,
		    	'idPropiedad' => $idPropiedad
            ]);
            return response()->json("Exito");
        }
        return response()->json("fallo");
    }
}
