<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    protected $fillable = [
        'valor_envio',
        'conta_remetente',
        'conta_destinatario'
    ];

}
