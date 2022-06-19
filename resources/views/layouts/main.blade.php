<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonte do Google -->
        <link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>  
        <link href = "https: //fonts.googleapis.com/css2? family = Quicksand "rel =" stylesheet ">

        <!-- CSS Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- CSS da Aplicação -->
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-ligth">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/img/icone3.jpg" alt="Aqui Fest">
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Festivais</a>
                        </li>
                        <li class="nav-item">
                            <a href="/events/create" class="nav-link">Criar Festival</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link">Meus Festivais</a>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="POST">
                                @csrf
                                <a href="/logout" 
                                    class="nav-link" 
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                        Sair</a>
                            </form>
                        </li>
                        @endauth
                        @guest
                        <li class="nav-item">
                            <a href="/login" class="nav-link">Cadastrar</a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="nav-link">Entrar</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <div class="container-fluid>
                <div class="row">
                    @if(session('msg'))
                        <p class='msg'>{{ session('msg')}}</p>
                    @endif    
                    @yield('content')
                </div>    
            </div>              
        </main>
    <body>    
    
        <footer>
            <p>Aqui Fest &copy; 2022</p>
        </footer>
        <script src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>         
</html>
