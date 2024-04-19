@extends('layouts.principal')

@section('contenido')
@include('partials.mensajes')

<table class="table table-striped table-bordered">
  <thead class="table-dark">
    <tr>
      <th>ID</th>
      <th>Nombre de usuario</th>
      <th>Rol</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($usuariosad as $usuario)
      <tr>  
        <td>{{ $usuario->ID }}</td>
        <td>{{ $usuario->userName }}</td>
        <td>{{ $usuario->rol }}</td>
        <td>
          <form action="{{ action([App\Http\Controllers\UsersController::class, 'destroy'], ['admin' => $usuario->ID]) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-rounded">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M3.5 2.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5V3h-9v-.5zm9-1a1.5 1.5 0 0 1 1.5 1.5V3a2.5 2.5 0 0 1-2.5 2.5h-8A2.5 2.5 0 0 1 1 3V2.5A1.5 1.5 0 0 1 2.5 1h8zM5 7V6h1v7a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1V6h1v1h-8zM3 6v7a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V6H3z"/>
              </svg>
              Borrar
            </button>
          </form>
          <form action="{{ route('admin.edit', ['admin' => $usuario->ID]) }}" method="GET" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-primary btn-rounded">
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

<a href="{{ url('admin/create') }}" class="btn btn-success">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
      <path d="M8 1a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V1.5A.5.5 0 0 1 8 1zM1.5 8a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1H2a.5.5 0 0 1-.5-.5zM8 14a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0v-6a.5.5 0 0 1 .5-.5zM15 8a.5.5 0 0 1-.5.5h-6a.5.5 0 0 1 0-1h6a.5.5 0 0 1 .5.5z"/>
    </svg>
    Agregar
</a>


<div id="containergraf" style="width: 100%; height: 400px;"></div>

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
            color: '#333333', // Cambiamos el color del título a negro
            fontSize: '24px' // Cambiamos el tamaño del título
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
<div class="container-wrapper-genially" style="position: relative; min-height: 400px; max-width: 100%;"><video class="loader-genially" autoplay="autoplay" loop="loop" playsinline="playsInline" muted="muted" style="position: absolute;top: 45%;left: 50%;transform: translate(-50%, -50%);width: 80px;height: 80px;margin-bottom: 10%"><source src="https://static.genial.ly/resources/loader-default.mp4" type="video/mp4" />Your browser does not support the video tag.</video><div id="662281eb57c6e800147b41d7" class="genially-embed" style="margin: 0px auto; position: relative; height: auto; width: 100%;"></div></div><script>(function (d) { var js, id = "genially-embed-js", ref = d.getElementsByTagName("script")[0]; if (d.getElementById(id)) { return; } js = d.createElement("script"); js.id = id; js.async = true; js.src = "https://view.genial.ly/static/embed/embed.js"; ref.parentNode.insertBefore(js, ref); }(document));</script>


@endsection