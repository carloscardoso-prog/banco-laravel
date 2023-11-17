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

        $retorno = Transacao::leftJoin('users as destinatario','users.id','=','transacaos.conta_destinatario')
                ->leftJoin('users as remetente','users.id','=','transacaos.conta_remetente')
                ->where('conta_remetente', $search)
                ->orWhere('conta_destinatario', $search)
                ->get();
        dd($retorno);
    }

    public function getClientesPesquisarIndex(string $search = ''){
        $cliente = $this->where(function($query) use ($search) {
            if($search) {
                $query->where('nome_cliente', "'". $search ."'");
                $query->orWhere('nome_cliente', 'LIKE', "%{$search}%");
            }
        })->get();

        return $cliente;
    }
}
