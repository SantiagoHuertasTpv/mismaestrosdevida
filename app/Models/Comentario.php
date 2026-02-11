<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

   // Nombre de la tabla (opcional si es el plural del modelo, pero mejor asegurar)
    protected $table = 'comentarios';

    // Campos que permitimos guardar
    protected $fillable = [
        'tunombre', 
        'nombremaestro', 
        'comentario_corto', 
        'comentario_largo',
        'fecha_creacion',  
        'activado'         
    ];
}
