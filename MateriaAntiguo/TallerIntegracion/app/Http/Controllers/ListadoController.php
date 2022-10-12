<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use DB;

class ListadoController extends Controller
{
    //
    public function inicio(){
        $query=DB::table('dbo.formulario')
        ->get();
        return view('inicio',['listado'=> $query]);

    }
}
