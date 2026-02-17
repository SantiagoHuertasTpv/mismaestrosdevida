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

    // 1. Declaramos la propiedad fuera del constructor
    public $pedido;

    // 2. Asignamos la variable manualmente
    public function __construct(Pedido $pedido) 
    {
        $this->pedido = $pedido;
    }

    public function build()
    {
        return $this->subject("Nuevo pedido recibido (#{$this->pedido->id})")
            ->markdown('emails.pedidos.admin');
    }
}