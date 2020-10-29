<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
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
use App\Telefono;
use App\TipoTelefono;
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
        ->orderBy('usuarios.idUsuario','DESC')
        ->get();
    	return view('admin.usuarios.index',compact('usuarios'));
    }
    public function create()
    {
        $idiomas = Idioma::pluck('nombreIdioma','idIdioma');
        $tiposPersonas = TipoPersona::pluck('nombreTipoPersona','idTipoPersona');
        $paises = Pais::pluck('nombrePais','idPais');
        $regiones = Region::pluck('nombreRegion','idRegion');
        $provincias = Provincia::pluck('nombreProvincia','idProvincia');
        $comunas = Comuna::pluck('nombreComuna','idComuna');
        $tiposUsuarios = TipoUsuario::pluck('nombreTipoUsuario','idTipoUsuario');

    	return view('admin.usuarios.create',compact('idiomas','tiposPersonas','paises','regiones','provincias','comunas','tiposUsuarios'));
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
            $validator = Validator::make($request->all(), [
                'title' => 'required|unique:posts|max:255',
                'body' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect('post/create')
                            ->withErrors($validator)
                            ->withInput();
            }
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
                $usuario->password = Crypt::encrypt($request->password);
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
        } catch (ModelNotFoundException $e) {
            toastr()->warning('No autorizado');
            DB::rollback();
            return back();
        } catch (QueryException $e) {
            toastr()->warning('Ha ocurrido un error, favor intente nuevamente' . $e->getMessage());
            DB::rollback();
            return back();
        } catch (DecryptException $e) {
            toastr()->info('Ocurrio un error al intentar acceder al recurso solicitado');
            DB::rollback();
            return back();
        } catch (Exception $e) {
            DB::rollback();         
            toastr()->error('Ha surgido un error inesperado', $e->getMessage(), ['timeOut' => 9000]);
            return redirect::back();
        }
    }
    public function edit($idUsuario)
    {
        $usuario = Usuario::find($idUsuario);
        $avatar = Avatar::find($usuario->idAvatar);
        $idiomas = Idioma::pluck('nombreIdioma','idIdioma');
        $tiposPersonas = TipoPersona::pluck('nombreTipoPersona','idTipoPersona');
        $paises = Pais::pluck('nombrePais','idPais');
        $regiones = Region::pluck('nombreRegion','idRegion');
        $provincias = Provincia::pluck('nombreProvincia','idProvincia');
        $comunas = Comuna::pluck('nombreComuna','idComuna');
        $tiposUsuarios = TipoUsuario::pluck('nombreTipoUsuario','idTipoUsuario');
        $direccionUsuario = DireccionUsuario::where('idUsuario',$idUsuario)->first();
        
        return view('admin.usuarios.edit',compact('usuario','avatar','idiomas','tiposPersonas','paises','regiones','provincias','comunas','tiposUsuarios','direccionUsuario'));
    }
    public function update(Request $request, $idUsuario)
    {
    	try {
            DB::beginTransaction();
                $id_avatar = null;
                //guardar imagenes
                if($request->file('avatar')){
                    $imagen = $request->file('avatar');
                    $imgName = uniqid().'.'.$imagen->getClientOriginalExtension();
                    $imagen->move('assets/images/users/',$imgName);
                    $idAvatar_create = Avatar::create([
                        'rutaAvatar'=> 'assets/images/users/'.$imgName
                    ]);
                    $id_avatar = $idAvatar_create->idAvatar;
                }
                //guardar usuario
                $usuario = Usuario::find($idUsuario);
                $usuario->nombre = $request->nombre;
                $usuario->apellido = $request->apellido;
                $usuario->rut = $request->rut;
                $usuario->correo = $request->correo;
                if ($id_avatar != null) {
                    $usuario->idAvatar = $id_avatar;
                }
                if ($request->password != null) {
                    $usuario->password = bcrypt($request->password);
                }
                $usuario->profesion = $request->profesion;
                $usuario->idTipoPersona = $request->idTipoPersona;
                $usuario->idIdioma = $request->idIdioma;
                $usuario->idTipoUsuario = $request->idTipoUsuario;
                $usuario->save();
                //direccion usuario
                $direccionUsuario = DireccionUsuario::where('idUsuario',$idUsuario)->first();
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

                toastr()->success('Actualizado Correctamente', 'El usuario: '.$request->nombre.' ha sido actualizado correctamente', ['timeOut' => 9000]);
            DB::commit();
            return redirect::to('napalm/usuarios');
        } catch (ModelNotFoundException $e) {
            toastr()->warning('No autorizado');
            DB::rollback();
            return back();
        } catch (QueryException $e) {
            toastr()->warning('Ha ocurrido un error, favor intente nuevamente' . $e->getMessage());
            DB::rollback();
            return back();
        } catch (DecryptException $e) {
            toastr()->info('Ocurrio un error al intentar acceder al recurso solicitado');
            DB::rollback();
            return back();
        } catch (Exception $e) {
            DB::rollback();         
            toastr()->error('Ha surgido un error inesperado', $e->getMessage(), ['timeOut' => 9000]);
            return redirect::back();
        }
    }
    public function destroy($idUsuario)
    {
    	try {
            $usuario = Usuario::find($idUsuario);
            toastr()->success('Eliminado Correctamente', 'El usuario: '.$usuario->nombre.' ha sido eliminado correctamente', ['timeOut' => 9000]);
            if ($usuario->idAvatar != null) {
                $avatar = Avatar::find($usuario->idAvatar);
                unlink($avatar->rutaAvatar);
            }
            $usuario->delete();
            return redirect::back();
        } catch (ModelNotFoundException $e) {
            toastr()->warning('No autorizado');
            DB::rollback();
            return back();
        } catch (QueryException $e) {
            toastr()->warning('Ha ocurrido un error, favor intente nuevamente' . $e->getMessage());
            DB::rollback();
            return back();
        } catch (DecryptException $e) {
            toastr()->info('Ocurrio un error al intentar acceder al recurso solicitado');
            DB::rollback();
            return back();
        } catch (Exception $e) {
            DB::rollback();         
            toastr()->error('Ha surgido un error inesperado', $e->getMessage(), ['timeOut' => 9000]);
            return redirect::back();
        }
    }
}
