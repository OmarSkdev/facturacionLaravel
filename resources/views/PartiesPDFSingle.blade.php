<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
    <link rel="stylesheet" href={{ $html}}>
</head>
<body>
    <h1>{{ $titulo }}</h1>
    <h2>{{ $fecha}}</h2>

    <div>
        <img src="https://www.w3schools.com/images/picture.jpg">
    </div>
    
    <table class="table table-bordered">
        <p>ID : - {{ $obtSingleRegistro->id}}</p>
        <p>Parties Type Nombre : - {{ !empty($obtSingleRegistro->
        obt_parties_type_nombre->parties_type_nombre) ? $obtSingleRegistro->
        obt_parties_type_nombre->parties_type_nombre : ''}}</p>
        <p>Nombre : - {{ $obtSingleRegistro->full_name}}</p>
        <p>Dirección : - {{ $obtSingleRegistro->address}}</p>
        <p>N°Titular Cuenta : - {{ $obtSingleRegistro->account_holder_name}}</p>
        <p>N°Cuenta : - {{ $obtSingleRegistro->account_no}}</p>
        <p> : - {{ $obtSingleRegistro->parties_type_id}}</p>
        <p>Nombre Banco : - {{ $obtSingleRegistro->bank_name}}</p>
        <p>Código IFSC : - {{ $obtSingleRegistro->ifsc_code}}</p>
        <p>Dirección Sucursal : - {{ $obtSingleRegistro->branch_address}}</p>
        <p>Creado: - {{ date('d-m-Y', strtotime($obtSingleRegistro->created_at))}}</p>
        <p>Actualizado: - {{ date('d-m-Y', strtotime($obtSingleRegistro->updated_at))}}</p>
    </table>
    
</body>
</html>