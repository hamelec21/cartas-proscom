<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CartaController;
use App\Http\Controllers\Api\ReferidoController;



Route::get('/restaurantes/{slug}', [CartaController::class, 'show']);



Route::post('/registrar-venta', [ReferidoController::class, 'registrarVenta']);

