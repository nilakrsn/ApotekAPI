<?php

use App\Http\Controllers\ObatController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\SalesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('/sales')->group(function(){
    Route::get('/', [SalesController::class, 'index']);
    Route::get('/{id}', [SalesController::class, 'show']);
    Route::post('/create', [SalesController::class, 'store']);
    Route::put('/{id}/edit', [SalesController::class, 'update']);
    Route::get('/{id}/delete', [SalesController::class, 'destroy']);
});

Route::prefix('/pelanggan')->group(function(){
    Route::get('/', [PelangganController::class, 'index']);
    Route::get('/{id}', [PelangganController::class, 'show']);
    Route::post('/create', [PelangganController::class, 'store']);
    Route::put('/{id}/edit', [PelangganController::class, 'update']);
    Route::get('/{id}/delete', [PelangganController::class, 'destroy']);
});


Route::prefix('/obat')->group(function(){
    Route::get('/', [ObatController::class, 'index']);
    Route::get('/{id}', [ObatController::class, 'show']);
    Route::post('/create', [ObatController::class, 'store']);
    Route::put('/{id}/edit', [ObatController::class, 'update']);
    Route::get('/{id}/delete', [ObatController::class, 'destroy']);
});