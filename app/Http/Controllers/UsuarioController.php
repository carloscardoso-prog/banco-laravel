<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public $usuario;
    public function __construct(Usuario $usuario){
        $this->usuario = $usuario;
    }

    public function cadastrarUsuario(Request $request){
        if($request->method() == "POST"){
            $objetoUsuario = $request->all();

            $objetoUsuario['senha'] = Hash::make($objetoUsuario['senha']);
            $this->usuario->create($objetoUsuario);

            return redirect()->route('dashboard.index');
        }
        return view('usuario.cadastrarUsuario');
    }

    //REFAZER ABAIXO PRA UPDATE
    public function adicionarSaldo(Request $request){
        if($request->method() == "POST"){
            $objetoSaldo = $request->all();

            $this->usuario->create($objetoSaldo);

            return redirect()->route('dashboard.index');
        }

        return view('usuario.adicionarSaldo');
    }

    public function login(Request $request){
        if($request->method() == 'POST'){
            $objetoLogin = $request->all();

            $usuarioCadastrado = $this->usuario->getUsuarioLogin($objetoLogin['usuario']);

            if(Hash::check($request['senha'], $usuarioCadastrado['senha'])){
                $request->session()->put('nome', $usuarioCadastrado['usuario']);
                return view('dashboard.relatorio');
            }

        }

        $request->session()->flush();
        return view('usuario.login');
    }
}
