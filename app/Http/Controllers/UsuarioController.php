<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public $user;
    public function __construct(User $user){
        $this->user = $user;
    }

    public function cadastrarUsuario(Request $request){
        if($request->method() == "POST"){
            $objetoUsuario = $request->all();

            $objetoUsuario['password'] = Hash::make($objetoUsuario['password']);
            $objetoUsuario['saldo'] = 0;
            $objetoUsuario['profile_picture'] = '';

            $this->user->create($objetoUsuario);

            return redirect()->route('dashboard.index');
        }
        return view('usuario.cadastrarUsuario');
    }

    //REFAZER ABAIXO PRA UPDATE
    public function adicionarSaldo(Request $request){
        if($request->method() == "POST"){
            $objetoSaldo = $request->all();
            $objetoSaldo['saldo'] = DefaultController::converteValoresSalvarBanco(['valor' => $objetoSaldo['saldo']]);
            $this->user->create($objetoSaldo);

            return redirect()->route('dashboard.index');
        }

        return view('usuario.adicionarSaldo');
    }
}
