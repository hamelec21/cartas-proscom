<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Referido;

class NuevoReferidoAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $referido;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Referido $referido)
    {
        $this->referido = $referido;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nuevo Referido Registrado - Admin Notification')
                    ->view('emails.nuevo_referido_admin');
    }
}
