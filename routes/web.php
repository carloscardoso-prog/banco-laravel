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

Route::group(['prefix' => 'dashboard',  'middleware' => 'auth'], function()
{
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
});

Route::get('/', [AuthController::class, 'show'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::group(['prefix' => 'transacao', 'middleware' => 'auth'], function()
{
    Route::get('/cadastrarTransacao', [TransacaoController::class, 'cadastrarTransacao'])->name('transacao.cadastro');
    Route::post('/cadastrarTransacao', [TransacaoController::class, 'cadastrarTransacao'])->name('transacao.cadastro');
});

Route::group(['prefix' => 'usuario', 'middleware' => 'auth'], function()
{
    Route::get('/adicionarSaldo', [UsuarioController::class, 'adicionarSaldo'])->name('usuario.adicionarSaldo');
    Route::post('/adicionarSaldo', [UsuarioController::class, 'adicionarSaldo'])->name('usuario.adicionarSaldo');
});

Route::group(['prefix' => 'usuario'], function()
{
    Route::get('/cadastrarUsuario', [UsuarioController::class, 'cadastrarUsuario'])->name('usuario.cadastrarUsuario');
    Route::post('/cadastrarUsuario', [UsuarioController::class, 'cadastrarUsuario'])->name('usuario.cadastrarUsuario');
});
