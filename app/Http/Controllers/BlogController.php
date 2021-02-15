<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\Blog;
use Session;
use DB;

class BlogController extends Controller
{
    public function index(){
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        if (Session::has('idTipoUsuario')) {
            if (Session::get('idTipoUsuario') != 3 && Session::get('idTipoUsuario') != 10) {
                return abort(401);
            }
        }
        $blogs = Blog::all();
        return view('admin.blog.index',compact('blogs'));
    }
    public function store(Request $request){
        try {
    		$validator = Validator::make($request->all(), [
                'nombreBlog' => 'required',
                'textoBlog' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('No deben quedar datos en blanco');
                return back();
            }
            
    		DB::beginTransaction();
            $blog = new Blog($request->all());
            $blog->save();
            toastr()->success('Blog creado de forma exitosa','Crear Correctamente');

    		DB::commit();
            return back();
    	} catch (ModelNotFoundException $e) {
            toastr()->warning('No posee saldo para realizar esta acción');
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
            return back();
        }
    }
    public function update(Request $request, $idBlog)
    {
        try {
    		$validator = Validator::make($request->all(), [
                'nombreBlog' => 'required',
                'textoBlog' => 'required'
            ]);
            if ($validator->fails()) {
                toastr()->info('No deben quedar datos en blanco');
                return back();
            }
            
    		DB::beginTransaction();
            $blog = Blog::find($idBlog);
            $blog->fill($request->all());
            $blog->save();
            toastr()->success('Blog actualizado de forma exitosa','Actualizado Correctamente');

    		DB::commit();
            return back();
    	} catch (ModelNotFoundException $e) {
            toastr()->warning('No posee saldo para realizar esta acción');
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
            return back();
        }
    }
    public function destroy($idBlog)
    {
        try {
    		DB::beginTransaction();
            $blog = Blog::find($idBlog);
            $blog->delete();
            toastr()->success('Blog eliminado de forma exitosa','Eliminado Correctamente');

    		DB::commit();
            return back();
    	} catch (ModelNotFoundException $e) {
            toastr()->warning('No posee saldo para realizar esta acción');
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
            return back();
        }
    }
    public function tipo_flex()
    {
        $tipoFlex = Blog::where('nombreBlog','FLEX')->first();
        return view('blog',compact('tipoFlex'));
    }
}
