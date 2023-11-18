<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public static function cadastrarUsuario(Request $request)
    {
        if ($request->method() == "POST") {
            $objetoUsuario = $request->all();

            $objetoUsuario['password'] = Hash::make($objetoUsuario['password']);
            $objetoUsuario['saldo'] = 0;

            User::create($objetoUsuario);

            return redirect()->route('dashboard.index');
        }
        return view('usuario.cadastrarUsuario');
    }
    public static function atualizarUsuario(Request $request)
    {
        $authId = Auth::user()->id;

        if ($request->method() == "PUT") {
            $objetoUsuario = $request->all();

            if (isset($objetoUsuario['password']) && isset($objetoUsuario['new_password'])) {

                validator($request->all(), [
                    'name' => ['required'],
                    'password' => ['required']
                ])->validate();

                $request['name'] = Auth::user()->name;

                if (auth()->attempt(request()->only('name', 'password')) && !empty($authId)) {
                    $objetoUsuario['password'] = $objetoUsuario['new_password'];
                } else {
                    unset($objetoUsuario['password']);
                }

                unset($objetoUsuario['new_password']);
            } else {
                unset($objetoUsuario['password']);
            }

            User::find($authId)
                ->update($objetoUsuario);

            return redirect()->route('dashboard.index');
        }
        return view('usuario.atualizarUsuario', compact('authId'));
    }
    //REFAZER ABAIXO PRA UPDATE
    public static function adicionarSaldo(Request $request)
    {
        if ($request->method() == "POST") {
            $objetoSaldo = $request->all();
            $objetoSaldo['saldo'] = DefaultController::converteValoresSalvarBanco(['valor' => $objetoSaldo['saldo']]);

            $usuarioRequest = User::find(Auth::user()->id);
            $objetoSaldo['saldo'] += $usuarioRequest['saldo'];

            $usuarioRequest->update(['saldo' => $objetoSaldo['saldo']]);

            return redirect()->route('dashboard.index');
        }

        return view('usuario.adicionarSaldo');
    }

    public static function verificaSaldoRemetente(array $dados)
    {
        $retorno = [];

        $usuarioDados = User::find($dados['id_rementete']);

        if ($usuarioDados['saldo'] < $dados['valor_envio']) {
            $retorno['erro'] = true;
        }

        return $retorno;
    }

    public static function enviaValoresContasTransacao(array $dados)
    {
        $remetente = User::find($dados['id_remetente']);
        $destinatario = User::find($dados['id_destinatario']);

        $remetente->update(['saldo' => ($remetente['saldo'] - $dados['valor_envio'])]);
        $destinatario->update(['saldo' => ($destinatario['saldo'] + $dados['valor_envio'])]);
    }

    public static function buscarSaldo(array $dados)
    {
        $retorno = [];

        $retorno = User::select(array('users.saldo'))
            ->where('users.id', $dados['idUsuario'])
            ->get();

        if (!empty($retorno)) {
            $retorno = $retorno->all()[0];
        }

        return $retorno;
    }
}
