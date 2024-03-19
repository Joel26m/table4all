<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ABP Politécnicos</title>
    <link rel="icon" href="{{ asset('logo.png') }}">
        <!-- Bootstrap CSS (puedes cambiar 'flatly' por el bootswatch que prefieras) -->
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/flatly/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">
    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.10/dist/umd/popper.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand" href="/table4all/public/logo.png" >
            <img src="{{ asset('logo.png') }}" alt="logo" style="height: 200px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Datos maestros
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/M12/Proyecto2/table4all/public/rider">Riders</a>
                        <a class="dropdown-item" href="/M12/Proyecto2/table4all/public/collection">Cursos</a>
<<<<<<< HEAD
                        <a class="dropdown-item" href="/M12/Proyecto2/table4all/public/provider/2">Providers</a>
=======
                        <a class="dropdown-item" href="/M12/Proyecto2/table4all/public/provider/4">Providers</a>
>>>>>>> rama-raul

                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container" style="margin-top: 200px; padding-top: 20px;">
        @yield('content')
    </div>
    
</body>
</html>
