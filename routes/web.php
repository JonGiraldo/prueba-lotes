<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoteController;

// Route::get('/', function () {
//    return view('welcome');
// });

// Route::get('/', function () {
   //  return view('usuario');
// });

Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::post('/usuarios', [UsuarioController::class, 'store']);
Route::put('/usuarios/{id}', [UsuarioController::class, 'update']);
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']);


Route::get('/', function () {
    return view('lotes');
});

Route::get('/lotes',[LoteController::class,'index']);
Route::put('/lotes/{id}',[LoteController::class,'update']);
