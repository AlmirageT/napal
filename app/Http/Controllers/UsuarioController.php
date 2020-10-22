<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Avatar;
use App\Idioma;
use App\TipoPersona;
use App\Usuario;
use App\Pais;
use App\Comuna;
use App\Provincia;
use App\Region;
use App\TipoUsuario;
use App\DireccionUsuario;
use DB;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::select('*')
        ->join('idiomas','usuarios.idIdioma','=','idiomas.idIdioma')
        ->join('avatares','usuarios.idAvatar','=','avatares.idAvatar')
        ->join('tipo_personas','usuarios.idTipoPersona','=','tipo_personas.idTipoPersona')
        //->join('direcciones_usuarios','usuarios.idUsuario','=','direcciones_usuarios.idUsuario')
        ->get();
    	return view('admin.usuarios.index',compact('usuarios'));
    }
    public function create()
    {
        $idiomas = Idioma::pluck('nombreIdioma','idIdioma');
        $tipos_personas = TipoPersona::pluck('nombreTipoPersona','idTipoPersona');
        $paises = Pais::pluck('nombrePais','idPais');
        $regiones = Region::pluck('nombreRegion','idRegion');
        $provincias = Provincia::pluck('nombreProvincia','idProvincia');
        $comunas = Comuna::pluck('nombreComuna','idComuna');
        $tipos_usuarios = TipoUsuario::pluck('nombreTipoUsuario','idTipoUsuario');
    	return view('admin.usuarios.create',compact('idiomas','tipos_personas','paises','regiones','provincias','comunas','tipos_usuarios'));
    }
    protected function curls($request)
    {
        $nuevadireccion = urlencode($request);
        $json = "https://maps.googleapis.com/maps/api/geocode/json?address=".$nuevadireccion."&sensor=false&key=AIzaSyB9BKzI4HVxT1mjnxQIHx_8va7FBvROI6g";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $google_maps = json_decode($response);
        return response()->json($google_maps);
    }
    public function obtenerRegiones($idPais)
    {
        $regiones = Region::where('idPais',$idPais)->get();
        return response()->json($regiones);
    }
    public function obtenerProvincias($idRegion)
    {
        $provincias = Provincia::where('idRegion',$idRegion)->get();
        return response()->json($provincias);
    }
    public function obtenerComuna($idProvincia)
    {
        $comunas = Comuna::where('idProvincia',$idProvincia)->get();
        return response()->json($comunas);
    }
    public function store(Request $request)
    {
    	try {
            DB::beginTransaction();
                $id_avatar = null;
                //guardar imagenes
                if($request->file('avatar')){
                    $imagen = $request->file('avatar');
                    $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
                    $imagen->move('assets/images/users/',$imgName);
                    $id = Avatar::create([
                        'rutaAvatar'=> 'assets/images/users/'.$imgName
                    ]);
                    $id_avatar = $id->idAvatar;
                }
                //guardar usuario
                $usuario = new Usuario();
                $usuario->nombre = $request->nombre;
                $usuario->apellido = $request->apellido;
                $usuario->rut = $request->rut;
                $usuario->correo = $request->correo;
                $usuario->idAvatar = $id_avatar;
                $usuario->password = bcrypt($request->password);
                $usuario->profesion = $request->profesion;
                $usuario->tokenCorto = uniqid();
                $usuario->activarCuenta = 0;
                $usuario->activarNewsletter = 0;
                $usuario->desactivarCuenta = 0;
                $usuario->idTipoPersona = $request->idTipoPersona;
                $usuario->idIdioma = $request->idIdioma;
                $usuario->idTipoUsuario = $request->idTipoUsuario;
                $usuario->save();
                $usuario->token = encrypt($usuario->idUsuario);
                $usuario->save();
                //direccion usuario
                $direccionUsuario = new DireccionUsuario();
                $direccionUsuario->idUsuario = $usuario->idUsuario;
                $direccionUsuario->direccion1 = $request->direccion1;
                $direccionUsuario->direccion2 = $request->direccion2;
                $direccionUsuario->codigoPostal = $request->codigoPostal;
                $direccionUsuario->idPais = $request->idPais;
                $direccionUsuario->idProvincia = $request->idProvincia;
                $direccionUsuario->idComuna = $request->idComuna;
                $direccionUsuario->idRegion = $request->idRegion;
                $direccionUsuario->latitud = $request->latitud;
                $direccionUsuario->longitud = $request->longitud;
                $geoHash = DB::select("SELECT ST_GeoHash($request->longitud, $request->latitud, 16) as geoHash");
                $direccionUsuario->poi = $geoHash[0]->geoHash;
                $direccionUsuario->save();

                toastr()->success('Agregado Correctamente', 'El usuario: '.$request->nombre.' ha sido agregado correctamente', ['timeOut' => 9000]);
            DB::commit();
            return redirect::to('napalm/usuarios');
        } catch (Exception $e) {
            DB::rollback();
            toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
            return redirect::back();
        }
    }
    public function update(Request $request, $id)
    {
    	# code...
    }
    public function destroy($id)
    {
    	try {
            $usuario = Usuario::find($id);
            toastr()->success('Eliminado Correctamente', 'El usuario: '.$usuario->nombre.' ha sido eliminado correctamente', ['timeOut' => 9000]);
            $usuario->delete();
            return redirect::back();
        } catch (Exception $e) {
            toastr()->error('Ha surgido un error inesperado', $e, ['timeOut' => 9000]);
            return redirect::back();      
        }
    }
}
