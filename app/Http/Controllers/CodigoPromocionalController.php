<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use DB;

class CodigoPromocionalController extends Controller
{
    public function index()
    {
    	# code...
    }
    public function store(Requets $request)
    {
    	# code...
    }
    public function update(Requets $request, $idCodigoPromocional)
    {
    	# code...
    }
    public function destroy($idCodigoPromocional)
    {
    	# code...
    }
}
