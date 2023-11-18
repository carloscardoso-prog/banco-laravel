<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public static function index(Request $request)
    {
        $userAuth = auth()->user();
        $transacoesRelacionadas = TransacaoController::buscarTransacoesUsuarioAutenticado(['idUsuario' => $userAuth->id]);
        $saldo = UsuarioController::buscarSaldo(['idUsuario' => $userAuth->id]);
        $conversaoMoedas = TransacaoController::converterMoedas(['saldo' => $saldo->saldo]);
        $saldo->saldo = str_replace('.', ',', $saldo->saldo);

        return view("dashboard.relatorio", compact("userAuth","transacoesRelacionadas","saldo","conversaoMoedas"));
    }
}
