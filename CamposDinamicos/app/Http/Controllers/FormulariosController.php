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
        //$query = DB::select("exec Listar_Formularios :parametro",array( 'id'=>$id )); 
        $values = ['1']; #Este seria el parametro del id del usuario
        $query = DB::select('EXEC Listar_Formularios ?',$values);
        return view('formularios',['listado'=> $query]);
    }

    public function crear_formulario(){
        $query = DB::select('EXEC Listar_Tablas');
        return view('crear',['listado'=> $query]);
    }

    public function updateselectedCampos($name){
        $values = [$name];
        $query = DB::select('EXEC Listar_Campos ?',$values);
        return view('crear',['campos'=> $query]);
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

    public function prodfunct(){

        $listado =UsuariosForms::all(); //Obtenemos los datos de tablas

        return view('crear',compact('prod '));
    }

    public function findProductName(Request $request){

		

        $data=Product::select('nombre_usuario','id_usuario')->where('apellido1_usuario',$request->id_usuario)->take(100)->get();
        return response()->json($data);//then sent this data to ajax success
     
	}

}