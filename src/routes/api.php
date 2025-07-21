<?php

use App\Http\Controllers\Api\BukuController;
use App\Http\Controllers\Api\PembacaController;
use App\Http\Controllers\Api\PeminatController;

Route::apiResource('bukus', BukuController::class);
Route::apiResource('pembacas', PembacaController::class);
Route::apiResource('peminats', PeminatController::class);
