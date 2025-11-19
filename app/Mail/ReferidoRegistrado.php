<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReferidoRegistrado extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $linkReferido;

    public function __construct($nombre, $linkReferido)
    {
        $this->nombre = $nombre;
        $this->linkReferido = $linkReferido;
    }

    public function build()
    {
        return $this->subject('Tu link de referido')
            ->view('emails.referido_registrado');
    }
}
