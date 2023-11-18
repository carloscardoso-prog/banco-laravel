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

    public static function converteValoresExibirTela(array $dados)
    {
        $valor = str_replace(".", ",", $dados["valor"]);

        return $valor;
    }

    public static function cURLRequest(array $dados)
    {
        $url = $dados['url'];
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));

        $retorno['retorno'] = curl_exec($curl);
        $retorno['erro'] = curl_error($curl);

        curl_close($curl);

        if ($retorno['erro']) {
            return json_decode($retorno['erro'], true);
        } else {
            return json_decode($retorno['retorno'], true);
        }
    }
}
