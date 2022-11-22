<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\RegistroRequest;
use App\Http\Requests\EditarRequest;
use App\Http\Requests\FormularioRequest;
use App\Http\Requests\PapeleraRequest;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Models\Registro;
Use App\Models\RegistroEnlaces;
class CrudController extends Controller
{
    public function Registro(RegistroRequest $request){
        
        $registro = new Registro;
        $registro ->id_usuario = 1;         //Lugar para asignar al usuario a trabajar
        $registro -> nombre_formulario = $request -> get('nombre_formulario');
        $registro ->borrado = 0;
        $registro ->vigencia = 1;
        $registro ->save();

        

        $Registro1 = count($request -> get('tablas'));
        $Registro2 = count($request -> get('campos'));
        $Registro3 = count($request -> get('visibilidad'));

        $tablas = $request ->get('tablas');
        $campos = $request ->get('campos');
        $visibilidad = $request ->get('visibilidad');

        $id_formulario = db::select('EXEC Listar_Ultimo_Form');

        if($Registro1 == $Registro2){
            if($Registro1 == $Registro3){
                for($i = 0; $i < $Registro1; $i++){
                    $nombre_campo_formulario = strtoupper($campos[$i]);
                    $cadena_nueva = str_replace("_", " ", $nombre_campo_formulario);
                    
                    $RegistroEnlaces = new RegistroEnlaces;
                    $RegistroEnlaces ->id_formulario = $id_formulario[0] -> numero;
                    $RegistroEnlaces ->nombre_tabla = $tablas[$i];
                    $RegistroEnlaces ->nombre_campo = $campos[$i];
                    $RegistroEnlaces ->nombre_campo_form = $cadena_nueva;
                    $RegistroEnlaces ->visibilidad_campo = $visibilidad[$i] ? true : false;
                    $RegistroEnlaces ->borrado = 0;
                    $RegistroEnlaces ->vigencia = 1;
                    $RegistroEnlaces ->save();
                    

                };
            }
        }
        return Redirect::to("formularios");
    }
    
    public function Editar(EditarRequest $request,$id){
        $nombre_form_bd = DB::select('EXEC Nombre_Form ?', [$id]);
        $nombre_form = $request -> get('nombre_formulario');       
        if($nombre_form_bd[0] -> nombre_formulario != $nombre_form){
            DB::update('EXEC Act_Nombre ?, ?', [$id, $nombre_form]);
        }
        $Registro1 = count($request -> get('tablas'));
        $Registro2 = count($request -> get('campos'));
        $Registro3 = count($request -> get('visibilidad'));
        $tablas = $request ->get('tablas');
        $campos = $request ->get('campos');
        $visibilidad = $request ->get('visibilidad');
        $id_e = $request -> get('id');
        $todos_id_e = DB::select('EXEC Listar_id_enlace ?', [$id]);
        $eliminar_id = [];
        $t = [];
        for($a = 0; $a < count($todos_id_e); $a++){
            array_push($eliminar_id,$todos_id_e[$a] -> id_enlace);
        }
        $t = array_values(array_diff($eliminar_id, $id_e));
        for($e = 0; $e < count($t); $e++){
            //dump($t[$e]);
            DB::update('EXEC Eliminar_Dato ?', [$t[$e]]);
        }        
        if($Registro1 == $Registro2){
            if($Registro1 == $Registro3){
                for($i = 0; $i < $Registro1; $i++){
                    $nombre_campo_formulario = strtoupper($campos[$i]);
                    $cadena_nueva = str_replace("_", " ", $nombre_campo_formulario);
                    
                    if (is_null($id_e) != 1  && $id_e[$i] != 0){
                        $var1 = $id;
                        $var2 = $id_e[$i];
                        $var3 = $tablas[$i];
                        $var4 = $campos[$i]; 
                        $var5 = $cadena_nueva;
                        $var6 = $visibilidad[$i];                                               
                        DB::update('EXEC Act_Enlace ?, ?, ?, ?, ?, ?', [$var1, $var2, $var3, $var4,$var5,$var6]);
                    }else{                    
                        $RegistroEnlaces = new RegistroEnlaces;
                        $RegistroEnlaces ->id_formulario = $id;
                        $RegistroEnlaces ->nombre_tabla = $tablas[$i];
                        $RegistroEnlaces ->nombre_campo = $campos[$i];
                        $RegistroEnlaces ->nombre_campo_form = $cadena_nueva;
                        $RegistroEnlaces ->visibilidad_campo = $visibilidad[$i] ? true : false;
                        $RegistroEnlaces ->borrado = 0;
                        $RegistroEnlaces ->vigencia = 1;
                        $RegistroEnlaces ->save();
                    }
                };
            }
        }
        return Redirect::to("formularios");
    }

    public function Eliminar_form(FormularioRequest $request){
        $id_eliminar = $request->get('id_formulario');
        DB::update('EXEC Papelera_Form ?' ,[$id_eliminar]);

        return Redirect::to("formularios");
    }

    public function papelera_res(PapeleraRequest $request){
        $id_rest = $request ->get('id_formulario');
        
        DB::update('EXEC Restaurar_Form ?', [$id_rest]);

        return Redirect::to("formularios");
    }

}
