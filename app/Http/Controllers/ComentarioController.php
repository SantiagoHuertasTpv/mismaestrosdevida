<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;

class ComentarioController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validamos los campos originales
        $request->validate([
            'tunombre' => 'required|string|max:255',
            'nombremaestro' => 'required|string|max:255',
            'comentario_corto' => 'required|string|max:255',
            'comentario_largo' => 'required|string',
        ]);

        // 2. Creamos el comentario añadiendo los campos automáticos
        Comentario::create([
            'tunombre' => $request->tunombre,
            'nombremaestro' => $request->nombremaestro,
            'comentario_corto' => $request->comentario_corto,
            'comentario_largo' => $request->comentario_largo,
            'fecha_creacion' => now()->format('Y-m-d'), // Guarda la fecha de hoy
            'activado' => 0, // Por defecto entra desactivado para que tú lo revises
        ]);

        return redirect()->back()->with('success', '¡Comentario enviado! Aparecerá cuando sea revisado.');
    }
}
