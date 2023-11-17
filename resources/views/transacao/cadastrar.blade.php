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

                            <div class="col-sm-12 form-floating">
                                <select class="form-select" id="conta-destinatario" name="conta_destinatario"
                                    aria-label="Floating label select example">
                                    @foreach ($usuarios as $usuario)
                                        @if (Crypt::decrypt($usuario['id']) != $idAuth)
                                            <option value="{{ $usuario['id'] }}">{{ $usuario['name'] }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Selecione o destinatário</label>
                            </div>

                            <div class="col-sm-12">
                                <label for="valor-envio" class="form-label">Valor</label>
                                <input type="text" class="form-control dinheiro" id="valor-envio" name="valor_envio"
                                    required="">
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
