<?php

use App\Http\Controllers\UsuariosController;
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

Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/{id}', [UsuariosController::class, 'show'])->name('usuarios.show');
Route::put('/usuarios/novo', [UsuariosController::class, 'store'])->name('usuarios.store');
Route::post('/usuarios/editar/{id}', [UsuariosController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/excluir/{id}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
