<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public $usuario;

    public function __construct(User $usuario)
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

        $search = $request->all()['name'];

        $userId = $this->usuario->where(function ($query) use ($search) {
            if ($search) {
                $query->where('name', 'LIKE', "%{$search}%");
            }
        })->get();

        if (auth()->attempt(request()->only('name', 'password')) && !empty($userId)) {
            return redirect('/dashboard')->with(['userId' => $userId[0]->id]);
        }

        return redirect()->back()->withErrors(['name' => 'Dados inválidos!']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
