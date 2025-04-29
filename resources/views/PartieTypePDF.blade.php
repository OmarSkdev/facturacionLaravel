<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 12 PDF generar Parties type</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    {{ $titulo}}
    <p>{{ date('d-m-Y'), strtotime($fecha) }}</p>
    <p> Soy un desarrollador Profesional </p>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nombre Parties Type</th>
            <th>Creado</th>
            <th>Actualizado</th>
        </tr>

        @foreach ($parties as $valor )
        <tr>
            <td>{{ $valor->id}}</td>
            <td>{{ $valor->parties_type_nombre}}</td>
            <td>{{ date('d-m-Y', strtotime($valor->created_at))}}</td>
            <td>{{ date('d-m-Y', strtotime($valor->updated_at))}}</td>
        </tr>
        @endforeach
        
    </table>
</body>
</html>