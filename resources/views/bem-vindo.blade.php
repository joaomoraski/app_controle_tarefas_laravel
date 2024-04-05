<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos personalizados */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
<div class="container text-center">
    <h1>Bem-vindo à Página Inicial</h1>
    @guest
    @endguest

    @auth  {{--@ verifica auth --}}
        <p>Clique no botão abaixo para ir para a tela do dashboard.</p>
    @endauth
    <a href="{{ route('login') }}" class="btn btn-primary">Ir para a tela de login</a>
</div>

<!-- Bootstrap JS (opcional) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
