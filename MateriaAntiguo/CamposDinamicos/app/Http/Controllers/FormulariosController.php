<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use DB;

class FormulariosController extends Controller
{
    //
    public function list_formularios(){
        //$query=DB::table('dbo.formulario')
        //->get();
 
        $query = DB::select('EXEC Listar_Formulario_SID');

        return view('formularios',['listado'=> $query]);
    }

    public function crear_formulario(){
        $query = DB::select('EXEC Listar_Tablas');       
        return view('crear',['listado'=> $query]);
    }

    public function ver_formulario($id){
        $values = [$id];
        $query = DB::select('EXEC Listar_Formularios ?',$values);
        return view('ver',['id'=> $id]);
    }

    public function editar_formulario($id){
        $values = [$id];
        $query = DB::select('EXEC Listar_Enlaces ?',$values);
        $query2 = DB::select('EXEC Listar_Tablas');

        return view('editar',['enlaces'=> $query, 'listado'=> $query2]);
    }
}