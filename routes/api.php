<?php

use App\Http\Controllers\API\agent;
use App\Http\Controllers\API\courrier;
use App\Http\Controllers\API\departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('agent', [agentController::class, 'index']);
Route::post('/add-agent', [agentController::class, 'store']);
Route::get('/edit-agent/{id}', [agentController::class, 'edit']);

Route::get('departement', [departementController::class, 'index']);
Route::post('/add-departement', [departementController::class, 'store']);
Route::get('/edit-departement/{id}', [departementController::class, 'edit']);


Route::get('courrier', [courrierController::class, 'index']);
Route::post('/add-courrier', [courrierController::class, 'store']);
Route::get('/edit-courrier/{id}', [courrierController::class, 'edit']);





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


