<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\QrCancion;

class Capitulo extends Model
{
    use HasFactory;

    protected $table = 'capitulos';

    protected $fillable = ['nombre']; 

    public function canciones() {
        return $this->hasMany(QrCancion::class, 'idcapitulo');
    }
}
