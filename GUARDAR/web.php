<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormulariosController;
use App\Http\Controllers\CrudController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('inicio');
//});

Route::get('/',[HomeController::class,'index']);
Route::get('/formularios', [FormulariosController::class, 'list_formularios']);

Route::get('/formularios/crear', [FormulariosController::class, 'crear_formulario']);
Route::post('/formularios/crear',  [FormulariosController::class, 'guardar_formulario']);

Route::get('/formularios/ver/{id}', [FormulariosController::class, 'ver_formulario']);

Route::get('/formularios/editar/{id}', [FormulariosController::class, 'updateselectedCampos']);

Route::get('get-states', [FormulariosController::class, 'getStates'])->name('getStates');
Route::post('/formularios/crear', [CrudController::class,'Registro']);