<?php
namespace App\Http\Controllers;
use App\Models\UsuariosForms;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\RegistroRequest;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Models\Registro;
class FormulariosController extends Controller
{
    public function list_formularios(){   
        $values = [1];
        $query = DB::select('EXEC Listar_Formularios ?',$values);
        $query2 = DB::select('EXEC Listar_Usuario ?', $values);
        return view('formularios',['listado'=> $query, 'usuario'=>$query2]);
}
    public function crear_formulario(){
        $query = DB::select('EXEC Listar_Tablas');
        return view('crear',['listado'=> $query]);
    }
  
    public function getStates(Request $request)
    {
        $values = [$request->id_usuario];
        $states = DB::select('EXEC Listar_Campos ?',$values);
        if (count($states) > 0) {
            return response()->json($states);
        }
    }

    public function updateselectedCampos($id, $tabla="contacto"){
        $values = [$id];
        $values2 = [$tabla];
        $query = DB::select('EXEC Listar_Campos ?',$values2);
        if($tabla!="none"){
            $query = DB::select('EXEC Listar_Campos ?',$values2);
        }
        $query1 = DB::select('EXEC Listar_Enlaces ?',$values);
        $query2 = DB::select('EXEC Listar_Tablas');
        $query3 = DB::select('EXEC Nombre_Form ?', $values);
        return view('editar',['enlaces'=> $query1, 'listado'=> $query2,'campos' => $query, 'nombre' => $query3]);
    }

    public function ver_formulario($id){
        $values = [$id];
        $query = DB::select('EXEC ver ?',$values);
        return view('ver',['listado'=> $query]);
    }

    public function guardar_formulario(RegistroRequest $request){
        $reg=new Registro;
        $reg -> nombre_tabla=$request ->get('nombre_tabla');
        $reg -> nombre_campo=$request ->get('nombre_campo');
        $reg -> borrado=$request ->get('borrado');
        $reg -> vigencia=$request ->get('vigencia');
        $reg -> save();
        return Redirect::to('/');
    }

    public function editar_formulario(Request $request, $id){
        $values = [$id];
        
        $query = DB::select('EXEC Listar_Enlaces ?',$values);
        $query2 = DB::select('EXEC Listar_Tablas');
        $query3 = DB::select('EXEC Nombre_Form ?', $values);
        return view('editar',['enlaces'=> $query, 'listado'=> $query2, 'nombre' => $query3]);
    }

    public function papelera(){
        $values = [1];
        $query = DB::select('EXEC Listar_Forms_E ?',$values);
        $query2 = DB::select('EXEC Listar_Usuario ?', $values);
        return view('papelera',['listado'=> $query, 'usuario'=>$query2]);
    }
    
    

    

}