@extends('index')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('usuario.atualizarUsuario', $authId) }}">
            @csrf
            @method('PUT')
            <main>
                <div class="d-flex justify-content-center mt-5">
                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">Atualizar Dados do Usuario</h4>
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label for="name" class="form-label">Nome de Usuário</label>
                                <input type="text" class="form-control" id="name-antiga" placeholder="" name="name" value="" required="">
                            </div>

                            <div class="col-sm-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="" name="email" value="" required="">
                            </div>

                            <div class="col-sm-12">
                                <label for="senha-antiga" class="form-label">Senha antiga</label>
                                <input type="password" class="form-control" id="senha-antiga" placeholder="" name="password" value="">
                            </div>

                            <div class="col-sm-12">
                                <label for="senha-nova" class="form-label">Senha nova</label>
                                <input type="password" class="form-control" id="senha-nova" placeholder="" name="new_password" value="" disabled="disabled" required="">
                            </div>
                        </div>

                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="submit">Atualizar</button>
                    </div>
                </div>
            </main>
        </form>
    </div>
@endsection
