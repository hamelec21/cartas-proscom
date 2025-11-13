<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'slug', 'logo', 'color_primario', 'descripcion', 'telefono', 'direccion', 'activo', 'fecha_pago', 'correo', 'horario_atencion', 'qr'];


    /*========Relaciones=============*/


    public function categorias()
    {
        return $this->hasMany(Categoria::class);
    }
}
