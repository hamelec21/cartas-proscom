<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Venta_Referido;

class NuevaVentaAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $venta;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Venta_Referido $venta)
    {
        $this->venta = $venta;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nueva Venta Registrada - Admin Notification')
                    ->view('emails.nueva_venta_admin');
    }
}
