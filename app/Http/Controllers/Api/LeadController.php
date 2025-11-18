<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'negocio' => 'nullable|string|max:255',
            'ref_code' => 'nullable|string|max:50',
        ]);

        $lead = Lead::create($validated);

        return response()->json([
            'message' => 'Lead registrado correctamente',
            'data' => $lead
        ], 201);
    }
}
