@extends('index')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('usuario.cadastrarUsuarioo') }}">
            @csrf
            <main>
                <div class="d-flex justify-content-center mt-5">
                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">Dados do Usuario</h4>
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label for="usuario" class="form-label">Usuario</label>
                                <input type="text" class="form-control" id="usuario" placeholder=""
                                    value="" required="">
                            </div>

                            <div class="col-sm-12">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="text" class="form-control" id="senha" placeholder=""
                                    value="" required="">
                            </div>

                            <div class="col-sm-12">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome" placeholder=""
                                    value="" required="">
                            </div>
                            <input type="hidden" class="form-control" id="saldo" placeholder=""
                            value="0.00" required="">
                        </div>

                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="submit">Cadastrar</button>
                    </div>
                </div>
            </main>
        </form>
    </div>
@endsection
