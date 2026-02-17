<?php



namespace App\Mail;

use App\Models\Comentario;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NuevoComentarioAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $comentario;

    public function __construct(Comentario $comentario)
    {
        $this->comentario = $comentario;
    }

    public function build()
    {
        return $this->subject('🔔 Nuevo testimonio recibido: Mis Maestros de Vida')
                    ->view('emails.nuevo_comentario'); // Crearemos esta vista ahora
    }
}