<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1>{{ $titulo }}</h1>
    <p>{{ $fecha }}</p>
    <p>Progrmación y Tutoriales de Desarollo Web</p>



    <table class="table table-bordered">
        <tr>
            <td>ID</td>
            <td>Nombre Tipo Parties </td>
            <td>Nombre</td>
            <td>Fono</td>
            <td>Dirección</td>
            
        </tr>
        @foreach ($parties as $valor )
        <tr>
            <td>{{$valor->id}}</td>>
            <td>{{$valor->parties_type_nombre}}</td>
            <td>{{$valor->full_name}}</td>
            <td>{{$valor->phone_no}}</td>
            <td>{{$valor->address}}</td>
                             
        </tr>
            
        @endforeach
    </table> <table class="table table-bordered">
        <tr>
            
            <td>Nombre Cuenta</td>
            <td>Nombre Cuenta</td>
            <td>Nombre Banco</td>
            <td>Código IFSC</td>
            <td>Sucursal</td>
            <td>Creado</td>
            <td>Actualizado</td>
        </tr>
        @foreach ($parties as $valor )
        <tr>
           
            <td>{{$valor->account_holder_name}}</td>            
            <td>{{$valor->account_no}}</td>
            <td>{{$valor->bank_name}}</td>
            <td>{{$valor->ifsc_code}}</td>
            <td>{{$valor->branch_address}}</td>
            <td>{{date('d/m/Y', strtotime($valor->created_at))}}</td>
            <td>{{date('d/m/Y', strtotime($valor->updated_at))}}</td>                   
        </tr>
            
        @endforeach
    </table>

    




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>