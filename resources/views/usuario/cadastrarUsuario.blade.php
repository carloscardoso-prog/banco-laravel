@extends('index')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('usuario.cadastrarUsuario') }}">
            @csrf
            <main>
                <div class="d-flex justify-content-center mt-5">
                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">Dados do Usuario</h4>
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label for="name" class="form-label">Nome de Usuário</label>
                                <input type="text" class="form-control" id="name" placeholder="" name="name" value="" required="">
                            </div>

                            <div class="col-sm-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="" name="email" value="" required="">
                            </div>

                            <div class="col-sm-12">
                                <label for="password" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="senha" placeholder="" name="password" value="" required="">
                            </div>
                        </div>

                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="submit">Cadastrar</button>
                    </div>
                </div>
            </main>
        </form>
    </div>
@endsection
