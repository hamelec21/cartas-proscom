<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use App\Models\Venta_Referido;

class VentaPagadaReferido extends Mailable
{
    use Queueable, SerializesModels;

    public $venta;

    /**
     * Recibir la venta en el constructor
     */
    public function __construct(Venta_Referido $venta)
    {
        $this->venta = $venta;
    }

    /**
     * Asunto del correo
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '¡Tienes una comisión disponible!'
        );
    }

    /**
     * Renderizar la vista del correo
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.venta_pagada',
            with: [
                'venta' => $this->venta
            ]
        );
    }

    /**
     * Archivos adjuntos (opcional)
     */
    public function attachments(): array
    {
        return [];
    }
}
