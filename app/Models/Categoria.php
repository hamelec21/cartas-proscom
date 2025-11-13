<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = ['restaurante_id', 'nombre', 'orden', 'icono'];




    /*========Relaciones=============*/
    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class);
    }

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

    public function categorias()
    {
        return $this->hasMany(Categoria::class);
    }
}
