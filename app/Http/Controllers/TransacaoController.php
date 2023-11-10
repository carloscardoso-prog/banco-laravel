<?php

namespace App\Http\Controllers;

use App\Models\Transacao;
use Illuminate\Http\Request;

class TransacaoController extends Controller
{
    public $transacao;

    public function __construct(Transacao $transacao){
        $this->transacao = $transacao;
    }

    public function cadastrarTransacao(Request $request){
        if($request->method() == "POST"){
            $objetoTransacao = $request->all();

            $this->transacao->create($objetoTransacao);

            return redirect()->route('dashboard.index');
        }

        return view("transacao.cadastrar");
    }
}
