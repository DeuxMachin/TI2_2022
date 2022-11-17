<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistroRequest;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Models\Registro;
Use App\Models\RegistroEnlaces;

class CrudController extends Controller
{
    public function Registro(RegistroRequest $request){
        //dd($request);
        $registro = new Registro;
        $registro ->id_usuario = 1;
        $registro -> nombre_formulario = $request -> get('nombre_formulario');
        $registro ->borrado = 0;
        $registro ->vigencia = 1;
        $registro ->save();

        $cc1 = count($request -> get('tablas'));
        $cc2 = count($request -> get('campos'));
        $cc3 = count($request -> get('visibilidad'));

        $tablas = $request ->get('tablas');
        $campos = $request ->get('campos');
        $visibilidad = $request ->get('visibilidad');

        $id_formulario = db::select('EXEC Listar_Ultimo_Form');

        if($cc1 == $cc2){
            if($cc1 == $cc3){
                for($i = 0; $i < $cc1; $i++){
                    $RegistroEnlaces = new RegistroEnlaces;
                    $RegistroEnlaces ->id_formulario = $id_formulario[0] -> numero;
                    $RegistroEnlaces ->nombre_tabla = $tablas[$i];
                    $RegistroEnlaces ->nombre_campo = $campos[$i];
                    $RegistroEnlaces ->nombre_campo_form = $campos[$i];
                    $RegistroEnlaces ->visibilidad_campo = $visibilidad[$i] ? true : false;
                    $RegistroEnlaces ->borrado = 0;
                    $RegistroEnlaces ->vigencia = 1;
                    $RegistroEnlaces ->save();
                    //dump($tablas[$i], $campos[$], $visibilidad[$i], $id_formulario[0]->Numero);

                };
            }
        }
        return Redirect::to("formularios");
    }
    //
}
