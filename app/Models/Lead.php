<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'negocio',
        'ref_code',
        'estado',
    ];

    // Relación opcional: si tienes tabla "referidos"
    public function referido()
    {
        return $this->belongsTo(Referido::class, 'ref_code', 'codigo');
    }
}
