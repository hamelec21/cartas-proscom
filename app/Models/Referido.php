<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Referido extends Model
{
    protected $fillable = [
        'nombre',
        'alias',
        'whatsapp',
        'email',
        'banco',
        'tipo_cuenta',
        'numero_cuenta',
        'rut',
        'link_generado',
        'estado'
    ];

    public function ventas()
    {
        return $this->hasMany(Venta_Referido::class);
    }
}
