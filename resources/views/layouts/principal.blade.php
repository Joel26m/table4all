<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Usuarios</title>
    <!-- Enlaces a los archivos CSS de Bootstrap -->
    @vite(['resources/css/app.css', 'resources/css/app.scss', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.highcharts.com/highcharts.js"></script>

</head>
<body>

    <div class="admincont">
    <div class="container">
        <h1 class="mt-5 admintit">Bitiby Users</h1>
       
        <!-- Lista de Usuarios -->
        <div class="card mt-4">
            <div class=" custom-card-header">Lista  de Usuarios</div>
            <div class="card-body">
                    @yield('contenido')
                    </div>
                    
    </div>
    </div>

        <br>

        
    <!-- Scripts de Bootstrap y cualquier otro script necesario -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
