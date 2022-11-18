<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListadoController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\FormularioController;

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



Route::get('/',[IndexController::class,'index']);


Route::get('/listado',[ListadoController::class,'listado']);


Route::get('/formulario',[FormularioController::class,'formulario']);




