@extends('layouts.principal')

@section('contenido')
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre de Usuario</th>
      <th scope="col">Correo</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Activo</th>
      <th scope="col">Tipo de Usuario</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($usuarios as $usuario)
      <tr>  
          <td>{{ $usuario->id }}</td>
          <td>{{ $usuario->nom_usuari }}</td>
          <td>{{ $usuario->correu }}</td>
          <td>{{ $usuario->nom }}</td>
          <td>{{ $usuario->cognom }}</td>
          <td>
    <input type="checkbox" disabled {{ $usuario->activo_checkbox }}>
</td>
          <td>{{ $usuario->tipus_usuaris_id }}</td>

          <td>
            <form
             action="{{ action([App\Http\Controllers\UsuarisController::class, 'destroy'], ['usuari'=> $usuario->id]) }}" method="POST">
              @csrf
              @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M3.5 2.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5V3h-9v-.5zm9-1a1.5 1.5 0 0 1 1.5 1.5V3a2.5 2.5 0 0 1-2.5 2.5h-8A2.5 2.5 0 0 1 1 3V2.5A1.5 1.5 0 0 1 2.5 1h8zM5 7V6h1v7a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1V6h1v1h-8zM3 6v7a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V6H3z"/>
                </svg>
                Trash
              </button>
            </form>
            <form action="">
              <button type="button" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                  <path d="M12.854 1.146a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.416.209l-2 1a.5.5 0 0 1-.166-.82l.97-.485a.5.5 0 0 1 .6.101l1.793 2.153a.5.5 0 0 1-.101.649L1.354 15.646a.5.5 0 0 1-.708-.708l2.75-2.75a.5.5 0 0 1 .649-.101l2.153 1.793a.5.5 0 0 1 .101.6l-.485.97a.5.5 0 0 1-.82-.166l-1-2a.5.5 0 0 1 .209-.416l10-10a.5.5 0 0 1 .708 0zm1.362-.471l1.146 1.146a1 1 0 0 1 0 1.414l-10 10a1 1 0 0 1-.724.307H3.5a1 1 0 0 1-1-1V11.5a.5.5 0 0 1 1 0V13h1.086l10-10L14 1.646a1 1 0 0 1 .216-.92zM13 2.5l-1.793 1.793L12.793 5H14v-1.207L13.207 2.5H13z"/>
                </svg>
                Editar
              </button>
            </form>

          </td>
      </tr>
    @endforeach
  </tbody>
</table>
{{ $usuarios->links() }}

<a href="{{ url('usuari/create') }}" class="btn btn-success">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
      <path d="M8 1a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V1.5A.5.5 0 0 1 8 1zM1.5 8a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1H2a.5.5 0 0 1-.5-.5zM8 14a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0v-6a.5.5 0 0 1 .5-.5zM15 8a.5.5 0 0 1-.5.5h-6a.5.5 0 0 1 0-1h6a.5.5 0 0 1 .5.5z"/>
    </svg>
    Agregar
</a>

@endsection