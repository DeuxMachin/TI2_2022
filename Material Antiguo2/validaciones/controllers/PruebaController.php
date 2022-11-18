<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    //



    public function store(Request $request)
    {
        request()->validate([
            'nombre_formulario' =>'required'
            
      

        ]);

        return $request;
    }


}
