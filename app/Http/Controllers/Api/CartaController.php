<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurante;
use Illuminate\Http\Request;

class CartaController extends Controller
{
    public function show($slug)
    {
        $restaurante = Restaurante::where('slug', $slug)
            ->where('activo', true)
            ->with(['categorias' => function ($q) {
                $q->where('activo', true)
                    ->orderBy('orden')
                    ->with(['productos' => function ($p) {
                        $p->where('activo', true);
                    }]);
            }])
            ->firstOrFail();

        // Logo completo
        $restaurante->logo = $restaurante->logo
            ? asset('storage/' . $restaurante->logo)
            : null;

        // Agregar URL completa del icono de categoría y de las imágenes de productos
        foreach ($restaurante->categorias as $categoria) {
            // Icono de categoría
            $categoria->icono = $categoria->icono
                ? asset('storage/' . $categoria->icono)
                : null;

            // Imágenes de productos dentro de la categoría
            if ($categoria->productos->isNotEmpty()) {
                foreach ($categoria->productos as $producto) {
                    $producto->imagen = $producto->imagen
                        ? asset('storage/' . $producto->imagen)
                        : null;
                }
            }
        }

        return response()->json($restaurante);
    }
}
