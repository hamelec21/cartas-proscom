<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CartaController;
use App\Http\Controllers\Api\ReferidoController;
use App\Http\Controllers\Api\LeadController;



Route::get('/restaurantes/{slug}', [CartaController::class, 'show']);
Route::post('/registrar-venta', [ReferidoController::class, 'registrarVenta']);
Route::post('/pre-registro', [LeadController::class, 'store']);
