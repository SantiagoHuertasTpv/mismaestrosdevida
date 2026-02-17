<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use Illuminate\Support\Facades\Mail; // 1. Importar Mail
use App\Mail\NuevoComentarioAdmin;    // 2. Importar tu nueva clase
use Illuminate\Support\Str;

class ComentarioController extends Controller
{
  public function store(Request $request)
    {
        $request->validate([
            'tunombre' => 'required|string|max:255',
            'nombremaestro' => 'required|string|max:255',
            'comentario_corto' => 'required|string|max:255',
            'comentario_largo' => 'required|string',
            'autorizo' => 'accepted', 
            'token' => Str::random(32)
        ]);

        $comentario = Comentario::create([
            'tunombre' => $request->tunombre,
            'nombremaestro' => $request->nombremaestro,
            'comentario_corto' => $request->comentario_corto,
            'comentario_largo' => $request->comentario_largo,
            'fecha_creacion' => now()->format('Y-m-d'),
            'activado' => 0, 
            'token' => Str::random(32),
        ]);

        // 3. Enviar mail al administrador
        $adminEmail = 'mismaestrosdevida@gmail.com'; 
        Mail::to($adminEmail)->send(new NuevoComentarioAdmin($comentario));

        return redirect()->back()->with('success', '¡Gracias! Tu testimonio ha sido enviado correctamente.');
    }

public function activar($id, $token) // Ambos parámetros deben estar aquí
{
    // Buscamos el comentario que coincida con el ID y el TOKEN
    // Esto es lo que garantiza la seguridad que buscábamos
    $comentario = Comentario::where('id', $id)
                            ->where('token', $token)
                            ->firstOrFail();

    // Si lo encuentra, lo activamos
    $comentario->update([
        'activado' => 1,
        'token' => null // Borramos el token para que el enlace no se pueda reutilizar
    ]);

    // Retornamos la vista de éxito que creamos antes
    return view('comentarios.activado_exito', compact('comentario'));
}

}
