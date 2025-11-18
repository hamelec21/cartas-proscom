<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta_Referido extends Model
{
    protected $fillable = [
        'cliente',
        'telefono',
        'email',
        'referido_id',
        'monto',
        'comision',
        'estado_pago'
    ];

    public function referido()
    {
        return $this->belongsTo(Referido::class);
    }
}
