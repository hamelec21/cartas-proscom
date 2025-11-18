<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Referido;
use App\Models\Venta_Referido;

class ReferidoController extends Controller
{
    /**
     * Mostrar todos los referidos
     */
    public function index()
    {
        $referidos = Referido::latest()->get();
        return view('referidos.index', compact('referidos'));
    }

    /**
     * Crear un nuevo referido
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'alias' => 'required|unique:referidos,alias',
        ]);

        $ref = Referido::create($request->all());

        // Generar el link automáticamente
        $ref->link_generado = "https://cartadigitalpro.vercel.app/?ref=" . $ref->alias;
        $ref->save();

        return back()->with('ok', 'Referido creado con link: ' . $ref->link_generado);
    }

    /**
     * Registrar venta enviada desde la landing
     */
    public function registrarVenta(Request $request)
    {
        $request->validate([
            'cliente' => 'required',
            'email' => 'required',
            'ref_code' => 'nullable|string',
        ]);

        $ref = Referido::where('alias', $request->ref_code)->first();

        $venta = Venta_Referido::create([
            'cliente' => $request->cliente,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'referido_id' => $ref?->id, // Null si no existe
            'monto' => 29970,
            'comision' => 3000, // comision del 10% $2997 se redondea a $3.000
        ]);

        return response()->json([
            'ok' => true,
            'venta_id' => $venta->id,
            'referido_detectado' => $ref?->alias
        ]);
    }

    /**
     * Listado de ventas por referidos
     */
    public function ventas()
    {
        $ventas = Venta_Referido::with('referido')->latest()->get();
        return view('referidos.ventas', compact('ventas'));
    }

    /**
     * Marcar comisión como pagada
     */
    public function marcarPagado($id)
    {
        $venta = Venta_Referido::findOrFail($id);
        $venta->estado_pago = 'pagado';
        $venta->save();

        return back()->with('ok', 'Comisión marcada como pagada');
    }
}
