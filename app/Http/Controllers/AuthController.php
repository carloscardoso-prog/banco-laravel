<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public $usuario;

    public function __construct(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    public function show()
    {
        return view("usuario.login");
    }

    public function login(Request $request)
    {
        validator($request->all(), [
            'name' => ['required'],
            'password' => ['required']
        ])->validate();

        if (auth()->attempt(request()->only('name', 'password'))) {
            return redirect('/dashboard');
        }

        return redirect()->back()->withErrors(['name' => 'Dados inválidos!']);
        // if($request->method() == 'POST'){
        //     $objetoLogin = $request->all();

        //     $usuarioCadastrado = $this->usuario->getUsuarioLogin($objetoLogin['usuario']);

        //     if(Hash::check($request['senha'], $usuarioCadastrado['senha'])){
        //         $request->session()->put('nome', $usuarioCadastrado['usuario']);
        //         return view('dashboard.relatorio');
        //     }

        // }

        // $request->session()->flush();
        // return view('usuario.login');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
