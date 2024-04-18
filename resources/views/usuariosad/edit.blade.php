<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<h1 class="mt-5">Bitiby edit users</h1>
        
        <!-- Formulario para crear usuario -->
        <div class="card mt-4">
            <div class="card-header">Editar Usuario</div>
            <div class="card-body">
            <form action="{{ route('admin.update', ['admin' => $usuario->ID]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
                        <label for="nombreUsuario" class="form-label">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="nombreUsuario" name="userName">
                    </div>
                    <div class="mb-3">
                        <label for="contrasenya" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="contrasenya" name="password">
                    </div>
        </label>
    </div>
</div>
                    <div class="mb-3">
                        <label for="tipoUsuario" class="form-label">Rol</label>
                        <select class="form-select" id="tipoUsuario" name="rol">
                            <option value="rider">rider</option>
                            <option value="provider">provider</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">edit</button>
                    <a href="{{ url('admin') }}" " class="btn btn-danger">Salir</a>

                </form>
            </div>
        </div>
</body>
</html>