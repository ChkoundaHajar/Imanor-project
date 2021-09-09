<?php

use App\Http\Controllers\API\agent;
use App\Http\Controllers\API\courrier;
use App\Http\Controllers\API\departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('agent', [agentController::class, 'index']);
Route::post('/add-agent', [agentController::class, 'store']);
Route::get('/edit-agent/{id}', [agentController::class, 'edit']);
Route::put('/update-agent/{id}',[agentController::class, 'update']);
Route::delete('/delete-agent/{id}',[agentController::class, 'destroy']);


Route::get('departement', [departementController::class, 'index']);
Route::post('/add-departement', [departementController::class, 'store']);
Route::get('/edit-departement/{id}', [departementController::class, 'edit']);
Route::put('/update-departement/{id}',[departementController::class, 'update']);
Route::delete('/delete-departement/{id}',[departementController::class, 'destroy']);


Route::get('courrier', [courrierController::class, 'index']);
Route::post('/add-courrier', [courrierController::class, 'store']);
Route::get('/edit-courrier/{id}', [courrierController::class, 'edit']);
Route::put('update-courrier/{id}',[courrierController::class, 'update']);
Route::delete('delete-courrier/{id}',[courrierController::class, 'destroy']);





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


