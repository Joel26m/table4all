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

<hr>
<h2 style="color:#001D38; font-weight:700">Para Riders</h2>
<div class="container-wrapper-genially" style="position: relative; min-height: 400px; max-width: 100%; margin-top:100px"><video class="loader-genially" autoplay="autoplay" loop="loop" playsinline="playsInline" muted="muted" style="position: absolute;top: 45%;left: 50%;transform: translate(-50%, -50%);width: 80px;height: 80px;margin-bottom: 10%"><source src="https://static.genial.ly/resources/loader-default.mp4" type="video/mp4" />Your browser does not support the video tag.</video><div id="662281eb57c6e800147b41d7" class="genially-embed" style="margin: 0px auto; position: relative; height: auto; width: 100%;"></div></div><script>(function (d) { var js, id = "genially-embed-js", ref = d.getElementsByTagName("script")[0]; if (d.getElementById(id)) { return; } js = d.createElement("script"); js.id = id; js.async = true; js.src = "https://view.genial.ly/static/embed/embed.js"; ref.parentNode.insertBefore(js, ref); }(document));</script>


@endsection
