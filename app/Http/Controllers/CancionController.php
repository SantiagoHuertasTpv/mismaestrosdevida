<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Cancion;

class CancionController extends Controller
{
    public function redirigir($slug): RedirectResponse
    {
        // Busca la canción por el slug o lanza un 404 si no existe
        $cancion = Cancion::where('slug', $slug)->firstOrFail();

        // Sumar estadística de escaneo
        $cancion->increment('clicks');

        // Salto directo a la plataforma de música
        return redirect()->away($cancion->url_destino);
    }
}
