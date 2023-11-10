<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'usuario',
        'senha',
        'nome',
        'saldo'
    ];

    public function getUsuarioLogin(string $search = '')
    {
        $usuario = $this->where(function ($query) use ($search) {
            if ($search) {
                $query->where('usuario', "".$search."");
            }
        })->get();

        if(!empty($usuario)){
            $usuario = $usuario[0];
        }

        return $usuario;
    }
}
