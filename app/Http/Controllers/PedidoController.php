<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PedidoConfirmacionCliente;
use App\Mail\PedidoNotificacionAdmin;

class PedidoController extends Controller
{
    public function create()
    {
        return view('pedido.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'email'     => 'required|email|max:255',
            'nombre'    => 'nullable|string|max:255',
            'telefono'  => 'nullable|string|max:50',

            'direccion' => 'required|string|max:255',
            'ciudad'    => 'required|string|max:120',
            'provincia' => 'nullable|string|max:120',
            'cp'        => 'required|string|max:10',
            'pais'      => 'nullable|string|max:120',

            'cantidad'  => 'required|integer|min:1|max:20',
            'nota'      => 'nullable|string|max:2000',
            'observaciones' => 'nullable|string|max:1000',
            'acepto'    => 'required|accepted',
        ], [
            'acepto.accepted' => 'Debes aceptar la política/condiciones para enviar el pedido.',
        ]);

        // Quitamos "acepto" (no hace falta guardarlo)
        unset($data['acepto']);

        $data['pais'] = $data['pais'] ?? 'España';

        $pedido = Pedido::create($data);

        // Mail al cliente
        Mail::to($pedido->email)->send(new PedidoConfirmacionCliente($pedido));

        // Mail al admin
        $admin = config('mail.pedidos_to', 'mismaestrosdevida@gmail.com');
        Mail::to($admin)->send(new PedidoNotificacionAdmin($pedido));

        return redirect()
            ->route('pedido.create')
            ->with('success', "¡Pedido recibido! Tu número de pedido es #{$pedido->id}. Te hemos enviado un email.");
    }
}
