<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransacaoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');
});

//logar e deslogar
Route::get('/', [AuthController::class, 'show'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::prefix('transacao')->group(function () {
    //realizar transação
    Route::get('/cadastrarTransacao', [TransacaoController::class, 'cadastrarTransacao'])->name('transacao.cadastro')->middleware('auth');
    Route::post('/cadastrarTransacao', [TransacaoController::class, 'cadastrarTransacao'])->name('transacao.cadastro')->middleware('auth');
});

Route::prefix('usuario')->group(function () {
    //adicionar saldo
    Route::get('/adicionarSaldo', [UsuarioController::class, 'adicionarSaldo'])->name('usuario.adicionarSaldo')->middleware('auth');
    Route::post('/adicionarSaldo', [UsuarioController::class, 'adicionarSaldo'])->name('usuario.adicionarSaldo')->middleware('auth');
    //cadastrar usuario
    Route::get('/cadastrarUsuario', [UsuarioController::class, 'cadastrarUsuario'])->name('usuario.cadastrarUsuario')->middleware('auth');
    Route::post('/cadastrarUsuario', [UsuarioController::class, 'cadastrarUsuario'])->name('usuario.cadastrarUsuario')->middleware('auth');
});
