@extends('index')

@section('content')
    <main class="form-signin d-flex justify-content-center mt-5">
        <form method="POST" action="{{ url('login') }}">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Login</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="name" name="name">
                <label for="usuario">Usuario</label>
            </div>
            <div class="form-floating mt-2">
                <input type="password" class="form-control" id="password" name="password">
                <label for="senha">Senha</label>
            </div>

            <button class="btn btn-primary w-100 py-2 mt-4" type="submit">Entrar</button>
            <a href="">Não tenho uma conta</a>

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
