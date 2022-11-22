<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroEnlaces extends Model
{
    use HasFactory;
    protected $table = 'enlaces';
    protected $primarykey = 'id_enlace';
    public $timestamps = false;
    protected $fillable= [
        'id_enlace',
        'id_formulario',
        'nombre_tabla',
        'nombre_campo',
        'nombre_campo_form',
        'visibilidad_campo',
        'borrado',
        'vigencia',
    ];

}
