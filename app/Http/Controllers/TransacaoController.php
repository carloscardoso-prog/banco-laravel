<?php

namespace App\Http\Controllers;

use App\Models\Transacao;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class TransacaoController extends Controller
{
    public static function cadastrarTransacao(Request $request)
    {
        $idAuth = Auth::user()->id;

        if ($request->method() == "POST") {
            $objetoTransacao = $request->all();

            $objetoTransacao['conta_remetente'] = $idAuth;
            $objetoTransacao['valor_envio'] = floatval($objetoTransacao['valor_envio']);
            $objetoTransacao['conta_destinatario'] = Crypt::decrypt($objetoTransacao['conta_destinatario']);

            $retorno[] = UsuarioController::verificaSaldoRemetente(['id_rementete' => $idAuth, 'valor_envio' => $objetoTransacao['valor_envio']]);

            if ((isset($retorno['erro']) && $retorno['erro'] == true) || $objetoTransacao['conta_destinatario'] == $idAuth) {
                return redirect()->route('erro.modal');
            }

            Transacao::create($objetoTransacao);
            UsuarioController::enviaValoresContasTransacao(['id_remetente' => $idAuth, 'id_destinatario' => $objetoTransacao['conta_destinatario'], 'valor_envio' => $objetoTransacao['valor_envio']]);

            return redirect()->route('dashboard.index');
        }

        $usuarios = User::all()->toArray();

        foreach ($usuarios as &$usuario) {
            $usuario['id'] = Crypt::encrypt($usuario['id']);
        }

        return view("transacao.cadastrar", compact('usuarios', 'idAuth'));
    }

    public static function buscarTransacoesUsuarioAutenticado(array $dados)
    {
        $retorno = [];

        $search = $dados['idUsuario'];

        $retorno = Transacao::select(array('transacaos.id', 'transacaos.valor_envio as valor_envio', 'remetente.name as nome_remetente', 'destinatario.name as nome_destinatario'))
            ->leftJoin('users as destinatario', 'destinatario.id', '=', 'transacaos.conta_destinatario')
            ->leftJoin('users as remetente', 'remetente.id', '=', 'transacaos.conta_remetente')
            ->where('conta_remetente', $search)
            ->orWhere('conta_destinatario', $search)
            ->get();

        if (!empty($retorno)) {
            foreach($retorno as $chaveTransacao => &$transacao){
                $transacao->taxa = $transacao->valor_envio * 0.05;

                foreach($transacao->toArray() as $chaveDado => &$dado){
                    if(is_numeric($dado)){
                        $dado = number_format(floatval($dado), 2);
                    }
                    $retorno[$chaveTransacao][$chaveDado] = str_replace('.', ',', $dado);
                }
            }
        }

        return $retorno;
    }

    public static function converterMoedas(array $dados)
    {
        $retorno = [];
        $arrayConversao = ['usd', 'btc', 'eur'];

        //ele utiliza brl como padrão
        foreach ($arrayConversao as $value) {
            $valorConversao = DefaultController::cURLRequest([
                "url" => "https://economia.awesomeapi.com.br/". strtoupper($value) ."/"
            ]);

            if(!empty($valorConversao)){
                $retorno[$value] = number_format($dados['saldo'] / $valorConversao[0]['high'], 2);
            }
        }

        foreach($retorno as &$valorRetorno){
            $valorRetorno = DefaultController::converteValoresExibirTela(['valor' => $valorRetorno]);
        }

        unset($valorConversao);

        return $retorno;
    }
}
