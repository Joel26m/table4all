@extends('layouts.principal')

@section('contenido')
@include('partials.mensajes')

<table class="table table-striped table-bordered">
  <thead  style="background-color: #001D38;" >
    <tr>
      <th style="color: white">ID</th>
      <th style="color: white">Nombre de usuario</th>
      <th style="color: white">Rol</th>
      <th style="color: white">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($usuariosad as $usuario)
      <tr style="background-color: #3d8ae23a">  
        <td>{{ $usuario->ID }}</td>
        <td>{{ $usuario->userName }}</td>
        <td>{{ $usuario->rol }}</td>
        <td>
          <form action="{{ action([App\Http\Controllers\UsersController::class, 'destroy'], ['admin' => $usuario->ID]) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-rounded">
              <i class="fa-solid fa-trash-can"></i>
              Borrar
            </button>
          </form>
          <form action="{{ route('admin.edit', ['admin' => $usuario->ID]) }}" method="GET" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-primary btn-rounded">
              <i class="fa-solid fa-pencil"></i>
              Editar
            </button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

<a href="{{ url('admin/create') }}" class="btn btn-success" style="background-color: #001d38d7">
  <i class="fa-solid fa-plus"></i>
    Agregar
</a>

<hr>
<div id="containergraf" style="width: 100%; height: 400px; margin-top:60px; "></div>

<script>
Highcharts.chart('containergraf', {
    chart: {
        type: 'pie', // Cambiamos el tipo de gráfico a pie (donut)
        plotBorderWidth: null,
        plotShadow: false
    },
    title: {
        text: 'Total user types of Bitiby',
        style: {
            color: '#001D38', // Cambiamos el color del título a negro
            fontSize: '26px', // Cambiamos el tamaño del título           
            fontWeight: '800'
          }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.y}'
            },
            colors: ['#FF691F', '#3D89E2'] // Cambiamos los colores de las secciones a naranja y rojo
        }
    },
    series: [{
        name: 'Users',
        data: [
            {
                name: 'Riders', // Etiqueta para Riders
                y: {{ $totalRiders ?? 0 }}
            },
            {
                name: 'Providers', // Etiqueta para Providers
                y: {{ $totalProviders ?? 0 }}
            }
        ]
    }]
});
</script>




@endsection
