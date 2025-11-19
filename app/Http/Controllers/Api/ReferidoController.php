<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Referido;
use App\Models\Venta_Referido;
use App\Mail\ReferidoRegistrado;
use Illuminate\Support\Facades\Mail;

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
            'email' => 'required|email',
            'whatsapp' => 'required',
            'banco' => 'required',
            'tipo_cuenta' => 'required',
            'numero_cuenta' => 'required',
            'rut' => 'required',
            'acepta_terminos' => 'required',
        ]);

        $data = $request->all();
        $data['estado'] = 'activo'; // Valor por defecto

        $ref = Referido::create($data);

        // Generar link automáticamente test local
        //$ref->link_generado = "http://localhost:3000/?ref=" . $ref->alias;
        //$ref->save();


        // Generar link automáticamente produccion
        $ref->link_generado = "https://cartadigitalpro.vercel.app/?ref=" . $ref->alias;
        $ref->save();

        // Enviar correo al referido
        Mail::to($ref->email)->send(new ReferidoRegistrado($ref->nombre, $ref->link_generado));

        return response()->json([
            'ok' => true,
            'mensaje' => 'Referido creado con éxito y correo enviado'
        ], 200, ['Content-Type' => 'application/json']);
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
            'comision' => 5000, // comision del 20% $29.970 se redondea a $5.000
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
