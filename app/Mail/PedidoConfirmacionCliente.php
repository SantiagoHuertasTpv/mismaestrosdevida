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

    // Declaramos la propiedad de forma explícita para PHP 7.x
    public $pedido;

    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
    }

    public function build()
    {
        return $this->subject("Tu pedido de Maestros de Vida (#{$this->pedido->id})")
                    ->view('emails.pedidos.cliente');
    }
}