<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/menu.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <title>Mayara Bacellar</title>
</head>
<body>
<div class="info-pag">
    @yield('info-pag')
</div>
<div id="toggleMenu" onclick="toggleMenu ()" ><div id='div' class="fas fa-bars shadow-lg" style="background-color: #54CDC0;padding: 10px; border-radius: 5px"></div></div>
<nav id="menu" class="menu-exit shadow-lg">
    <ul class="nav-bar">
        <li>
            <a class="btn btn-menu" href=""><span class="fas fa-calendar-alt mr-2"></span>Agenda</a>
        </li>
            <li>
                <a onclick="clientMenu()"  class="menu-client btn btn-menu" id="client"  href="#"><span class="fas fa-user mr-2"></span>Clientes</a>
            </li>
            <ul id="link-client" class="menu-client-exit">
                <li>
                    <a href="{{ route('client.create.view') }}" class=" btn btn-menu"><span class="fas fa-user-edit mr-2"></span>Cadastrar</a>
                </li>
                <li class="mt-2">
                    <a href="{{ route('clients.show.view') }}" class=" btn btn-menu"><span class="fas fa-search mr-2 "></span>Pesquisar</a>
                </li>
            </ul>
        <li>
            <a class="btn btn-menu" href=""><span class="fas fa-concierge-bell mr-2"></span>Serviços</a>
        </li>
        <li>
            <a class="btn btn-menu" href=""><span class="fas fa-cash-register mr-2"></span>Caixa</a>
        </li>
        <li>
            <a class="btn btn-menu" href=""><span class="fas fa-times-circle mr-2"></span>Sair</a>
        </li>
    </ul>
</nav>
    @yield('content')
@yield('js')
</body>
</html>