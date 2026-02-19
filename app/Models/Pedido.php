<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'email',
        'nombre',
        'telefono',
        'direccion',
        'ciudad',
        'provincia',
        'cp',
        'pais',
        'cantidad',
        'nota',
        'estado',
        'observaciones'
    ];
}
