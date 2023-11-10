<?php

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

Route::prefix('')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
});

Route::prefix('transacao')->group(function () {
    //realizar transação
    Route::get('/cadastrarTransacao', [TransacaoController::class, 'cadastrarTransacao'])->name('transacao.cadastro');
    Route::post('/cadastrarTransacao', [TransacaoController::class, 'cadastrarTransacao'])->name('transacao.cadastro');
});

Route::prefix('usuario')->group(function () {
    //adicionar saldo
    Route::get('/adicionarSaldo', [UsuarioController::class, 'adicionarSaldo'])->name('usuario.adicionarSaldo');
    Route::post('/adicionarSaldo', [UsuarioController::class, 'adicionarSaldo'])->name('usuario.adicionarSaldo');
    //cadastrar usuario
    Route::get('/cadastrarUsuario', [UsuarioController::class, 'cadastrarUsuario'])->name('usuario.cadastrarUsuario');
    Route::post('/cadastrarUsuario', [UsuarioController::class, 'cadastrarUsuario'])->name('usuario.cadastrarUsuario');
    //logar e deslogar
    Route::get('/login', [UsuarioController::class, 'login'])->name('usuario.login');
    Route::post('/login', [UsuarioController::class, 'login'])->name('usuario.login');
});
