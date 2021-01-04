<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use App\DireccionUsuario;
use App\EstadoCivil;
use App\Provincia;
use App\Telefono;
use App\Usuario;
use App\Region;
use App\Comuna;
use App\Idioma;
use App\Pais;
use App\Sexo;
use Session;
use DB;

class MisDatosController extends Controller
{
    public function index()
    {
    	if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
    	$usuario = Usuario::find(Session::get('idUsuario'));
    	$telefono = Telefono::where('idUsuario',Session::get('idUsuario'))->first();
    	$paises = Pais::pluck('nombrePais','idPais');
    	$comunas = Comuna::pluck('nombreComuna','idComuna');
    	$regiones = Region::pluck('nombreRegion','idRegion');
    	$provincias = Provincia::pluck('nombreProvincia','idProvincia');
    	$direccionUsuario = DireccionUsuario::where('idUsuario',Session::get('idUsuario'))->get();
    	$sexos = Sexo::pluck('nombreSexo','idSexo');
    	return view('public.miDatos',compact('usuario','telefono','paises','direccionUsuario','comunas','regiones','provincias','sexos'));
    }
    public function actualizarDatos(Request $request)
    {
        if ($request->idSexo) {
        	Usuario::find(Session::get('idUsuario'))->update([
        		'idSexo' => $request->idSexo,
        		'fechaNacimiento' => $request->fechaNacimiento
        	]);
        	if ($request->direccion1) {
	        	DireccionUsuario::create([
	        		'idUsuario' => Session::get('idUsuario'),
			    	'direccion1' => $request->direccion1,
			    	'direccion2' => $request->direccion2,
			    	'codigoPostal' => $request->codigoPostal,
			    	'idPais' => $request->idPais,
			    	'idProvincia' => $request->idProvincia,
			    	'idComuna' => $request->idComuna,
			        'idRegion' => $request->idRegion
	        	]);
        	}
            toastr()->success('Datos actualizados de forma correcta', 'Actualizado Correctamente');
            return back();
        }
    }
    public function cambioDatos()
    {
    	if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
    	$sexos = Sexo::pluck('nombreSexo','idSexo');
    	$idiomas = Idioma::pluck('nombreIdioma','idIdioma');
    	$usuario = Usuario::find(Session::get('idUsuario'));
    	$estadosCiviles = EstadoCivil::pluck('nombreEstadoCivil','idEstadoCivil');
    	return view('public.ajustesCuenta',compact('sexos','idiomas','usuario','estadosCiviles'));
    }
    public function actualizarContrasena(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'passwordActual'=>'required',
            'passwordNueva'=>'required_with:passwordRepite|same:passwordRepite'
        ]);
        if ($validator->fails()) {
            toastr()->info('La nueva contraseña deben ser iguales');
            return back();
        }
    	$usuario = Usuario::find(Session::get('idUsuario'));
    	$pass_decrytp = Crypt::decrypt($usuario->password);
    	if ($pass_decrytp == $request->passwordActual) {
    		$usuario->password = Crypt::encrypt($request->passwordActual);
    		$usuario->save();
            toastr()->success('Contraseña actualizados de forma correcta', 'Actualizado Correctamente');
            return back();
    	}else{
            toastr()->warning('La contraseña ingresada no es la que esta asociada a su cuenta', 'Error en Contraseña');
    		return back();
    	}
    }
    public function actualizacionDatosPersonales(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'idSexo'=>'required',
            'idIdioma'=>'required',
            'profesion'=>'required',
            'idEstadoCivil'=>'required'
        ]);
        if ($validator->fails()) {
            toastr()->info('Todos los datos son solicitados');
            return back();
        }
        Usuario::find(Session::get('idUsuario'))->update([
        	'idSexo'=>$request->idSexo,
            'idIdioma'=>$request->idIdioma,
            'profesion'=>$request->profesion,
            'idEstadoCivil'=>$request->idEstadoCivil
        ]);
        toastr()->success('Datos actualizados de forma correcta', 'Actualizado Correctamente');
        return back();
    }
}
