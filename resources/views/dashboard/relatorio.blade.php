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
                            <td>5</td>
                            <td>1</td>
                            <td>0.98</td>
                            <td>0.0000059</td>
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
                        <tr>
                            <td>1,001</td>
                            <td>5</td>
                            <td>0.25</td>
                            <td>Carlos</td>
                            <td>Fabio</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
