<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;
    protected $table = 'formulario';
    protected $primaryKey = 'id_formulario';
    public $timestamps = false;
    protected $fillable= [
        'id_formulario',
        'id_usuario',
        'nombre_formulario',
        'borrado',
        'vigencia',
    ];
}
