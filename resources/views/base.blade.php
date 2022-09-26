<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>Aplicação Laravel - Veículos</h1>
        </header>
        <nav>
            <ul>
                <li> <a href="{{ route('vehicles.index') }}">Início</a> </li>
                <li> <a href="{{ route('vehicles.create') }}">Novo Veículo</a> </li>
            </ul>
        </nav>
        <div class="content">
            {{-- code injection here... --}}
            @yield('content')
        </div>
        <footer>
            <small>Fatec Jales</small>
        </footer>
    </div>  
</body>
</html>