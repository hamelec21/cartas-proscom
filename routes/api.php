<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CartaController;



Route::get('/restaurantes/{slug}', [CartaController::class, 'show']);
