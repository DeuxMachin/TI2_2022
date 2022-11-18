<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function prodfunct(){

        $listado =UsuariosForms::all(); //Obtenemos los datos de tablas

        return view('crear',compact('prod '));
    }


}
