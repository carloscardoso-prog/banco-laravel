<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public static function show()
    {
        return view("usuario.login");
    }

    public static function login(Request $request)
    {
        validator($request->all(), [
            'name' => ['required'],
            'password' => ['required']
        ])->validate();

        $search = $request->all()['name'];

        $userId = User::where(function ($query) use ($search) {
            if ($search) {
                $query->where('name', 'LIKE', "%{$search}%");
            }
        })->get();

        if (auth()->attempt(request()->only('name', 'password')) && !empty($userId)) {
            session()->push('userId', $userId[0]->id);
            return redirect('/dashboard');
        }

        return redirect()->back()->withErrors(['name' => 'Dados inválidos!']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
