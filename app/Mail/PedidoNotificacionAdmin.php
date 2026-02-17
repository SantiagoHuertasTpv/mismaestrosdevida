<?php
// app/Mail/PedidoNotificacionAdmin.php
namespace App\Mail;

use App\Models\Pedido;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PedidoNotificacionAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Pedido $pedido) {}

    public function build()
    {
        return $this->subject("Nuevo pedido recibido (#{$this->pedido->id})")
            ->markdown('emails.pedidos.admin');
    }
}
