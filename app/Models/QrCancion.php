<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCancion extends Model
{
    use HasFactory;

    // Nombre de la tabla en tu base de datos
    protected $table = 'cancions';

    // Campos que se pueden llenar masivamente
    protected $fillable = ['nombre', 'slug', 'url_destino', 'clicks'];
}
