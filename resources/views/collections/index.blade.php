<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container">
        <table class="table mt-4">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Siglas</th>
                <th scope="col">Nombre</th>
                <th scope="col">Siglas Ciclo</th>
    
              </tr>
            </thead>
            <tbody>
                @foreach ($cursos as $curso)
                <tr>
                
                <td> {{ $curso->getId() }}</td>
                <td> {{ $curso->getSigles() }}</td>
                <td> {{ $curso->getNom() }}</td>
                <td> {{ $curso->getSiglesCicle() }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

</body>
</html>