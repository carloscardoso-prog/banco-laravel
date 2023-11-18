@extends('index')

@section('content')
    <div class="container-fluid pb-3">
        <div class="d-grid gap-3" style="grid-template-columns: 1fr 2fr;">
            <div class="bg-body-tertiary border rounded-3">
                <div class="table-responsive small">
                    <h2 class="mx-2">Saldo da conta</h2>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Real</th>
                                <th scope="col">Dólar</th>
                                <th scope="col">Euro</th>
                                <th scope="col">Bitcoin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $saldo->saldo }}</td>
                                <td>{{ $conversaoMoedas['usd'] }}</td>
                                <td>{{ $conversaoMoedas['eur'] }}</td>
                                <td>{{ $conversaoMoedas['btc'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-body-tertiary border rounded-3">
                <div class="table-responsive small">
                    <h2 class="mx-2">Transações</h2>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Protocolo</th>
                                <th scope="col">Valor da Transação</th>
                                <th scope="col">Taxa de Serviço</th>
                                <th scope="col">Remetente</th>
                                <th scope="col">Destinatário</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transacoesRelacionadas as $transacao)
                                <tr>
                                    <td>{{ $transacao->id }}</td>
                                    <td>{{ $transacao->valor_envio }}</td>
                                    <td>{{ $transacao->taxa }}</td>
                                    <td>{{ $transacao->nome_remetente }}</td>
                                    <td>{{ $transacao->nome_destinatario }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
