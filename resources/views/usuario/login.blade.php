@extends('index')

@section('content')
    <main class="form-signin d-flex justify-content-center mt-5">
        <form method="POST" action="{{ route('usuario.login') }}">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Login</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="usuario" name="usuario">
                <label for="usuario">Usuario</label>
            </div>
            <div class="form-floating mt-2">
                <input type="password" class="form-control" id="senha" name="senha">
                <label for="senha">Senha</label>
            </div>

            <button class="btn btn-primary w-100 py-2 mt-4" type="submit">Entrar</button>
            <a href="">Não tenho uma conta</a>
        </form>
    </main>
@endsection
