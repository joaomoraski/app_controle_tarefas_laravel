Site da aplicação
<br>
@auth  {{--@ verifica auth --}}
    <h1>oi</h1>
    <h1>{{ Auth::user()->id }}</h1> {{--  Recupera os dado   --}}
@endauth

@guest {{-- Executa se o cara for visitandte--}}
    Salve otario deslogado

@else
    ola pessoa
@endguest
