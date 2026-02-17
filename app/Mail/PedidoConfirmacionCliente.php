<?php

// app/Mail/PedidoConfirmacionCliente.php
namespace App\Mail;

use App\Models\Pedido;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PedidoConfirmacionCliente extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Pedido $pedido) {}

    public function build()
    {
        return $this->subject("Pedido recibido (#{$this->pedido->id})")
            ->markdown('emails.pedidos.cliente');
    }
}
