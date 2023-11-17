<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public static function index(Request $request)
    {
        $authId = Auth::user()->id;
        $transacoesRelacionadas = TransacaoController::buscarTransacoesUsuarioAutenticado(['idUsuario' => $authId]);
        // $transacoesRelacionadas = UsuarioController::buscarSaldo();
        return view("dashboard.relatorio", [
            "user" => auth()->user()
        ]);
    }
}
