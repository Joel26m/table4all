<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<h1 class="mt-5">CRUD de Usuarios</h1>
        
        <!-- Formulario para crear usuario -->
        <div class="card mt-4">
            <div class="card-header">Crear Usuario</div>
            <div class="card-body">
                <form action="{{ action([App\Http\Controllers\UsuarisController::class, 'store']) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nombreUsuario" class="form-label">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="nombreUsuario" name="nom_usuari">
                    </div>
                    <div class="mb-3">
                        <label for="contrasenya" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="contrasenya" name="contrasenya">
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="correo" name="correu">
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nom">
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="cognom">
                    </div>
                    <div class="mb-3">
                <label for="activo" class="form-label">Activo</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="activo" name="activo" value="1" checked>
                    <label class="form-check-label" for="activo">
                        Sí
        </label>
    </div>
</div>

                    <div class="mb-3">
                        <label for="tipoUsuario" class="form-label">Tipo de Usuario</label>
                        <select class="form-select" id="tipoUsuario" name="tipus_usuaris_id">
                            <option value="1">Tipo 1</option>
                            <option value="2">Tipo 2</option>
                            <option value="3">Tipo 3</option>
                            <!-- Agrega aquí más opciones si es necesario -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>
                    <a href="{{ url('usuari') }}" " class="btn btn-danger">Salir</a>

                </form>
            </div>
        </div>
</body>
</html>