@extends('index')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('transacao.cadastro') }}">
            @csrf
            <main>
                <div class="d-flex justify-content-center mt-5">
                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">Dados da Tranferência</h4>
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label for="destinatarioNome" class="form-label">Destinatário</label>
                                <input type="text" class="form-control" id="destinatarioNome" placeholder=""
                                    value="" required="">
                            </div>

                            <div class="col-sm-12">
                                <label for="valorTransferencia" class="form-label">Valor</label>
                                <input type="text" class="form-control" id="valorTransferencia" placeholder=""
                                    value="" required="">
                            </div>
                        </div>

                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="submit">Transferir</button>
                    </div>
                </div>
            </main>
        </form>
    </div>
@endsection
