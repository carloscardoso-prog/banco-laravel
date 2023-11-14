@extends('index')

@section('content')
    <main class="form-signin d-flex justify-content-center mt-5">
        <form method="POST" action="{{ url('login') }}">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Login</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="name" name="name">
                <label for="name">Usuario</label>
            </div>
            <div class="form-floating mt-2">
                <input type="password" class="form-control" id="password" name="password">
                <label for="password">Senha</label>
            </div>

            <button class="btn btn-primary w-100 py-2 mt-4" type="submit">Entrar</button>
            <div class="mt-3">
                <a href="{{ route('usuario.cadastrarUsuario') }}">Não tenho uma conta</a>
            </div>

            <div class="form-floating">
                @if ($errors->any())
                    <div class="bg-red-200 p-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </form>
    </main>
@endsection
