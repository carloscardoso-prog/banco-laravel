@extends('index')

@section('content')
<p>Eu comecei o código com o POST sem AJAX, então não tem modal pra tratar erro. Eu até posso refazer mas vai dar trabalho</p>
<p>Mas só pra documentar caso alguém esteja lendo isso, você pode apenas dar um catch em todos os posts de formulário, </p>
<p>e configurar o envio pro roteamento utilizando um input hidden com a rota do formulário</p>
<p>daí caso retorne erro, é possível includar o toastr com o retorno de erro vindo do PHP pro ajax</p>
<p>é possível fazer, inclusive no próximo projeto irei fazer desta forma.</p>

<p><br>--<br>--</p>
<p>Ass. Carlos</p>
@endsection
