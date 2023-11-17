<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public static function converteValoresSalvarBanco(array $dados)
    {
        $valor = str_replace(".","", $dados["valor"]);
        $valor = str_replace(",",".", $valor);

        return $valor;
    }
}
