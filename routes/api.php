<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuzController;
use App\Http\Controllers\CategoriesController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Routes publiques pour les tests (à supprimer en production)
Route::prefix('test')->group(function () {
    Route::get('/questions', [QuzController::class, 'index']);
    Route::post('/questions', [QuzController::class, 'store'])->middleware('api');
    Route::get('/questions/{quz}', [QuzController::class, 'show']);
    Route::put('/questions/{quz}', [QuzController::class, 'update'])->middleware('api');
    Route::delete('/questions/{quz}', [QuzController::class, 'destroy'])->middleware('api');
    Route::get('/categories', [CategoriesController::class, 'index']);
});
