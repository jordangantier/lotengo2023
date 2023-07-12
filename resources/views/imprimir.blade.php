<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimir Transacción</title>
    <link rel="stylesheet" href="{{ asset('css/print.css') }}">
</head>

<body>
    @foreach($toPrint as $prints)
    <table class="customTable">
        <thead>
            <tr>
                <th colspan="2"><strong>REGISTRO CLIENTES</strong></th>
                <th colspan="2"><strong>LBS/MKT/ASIF <br>INFORMACIONES</strong></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>CLIENTE</strong></td>
                <td>{{$prints->nombre}}</td>
                <td><strong>ASIF</strong></td>
                <td>{{$prints->usuario}}</td>
            </tr>
            <tr>
                <td><strong>TELEFONO</strong></td>
                <td>{{$prints->telefono}}</td>
                <td><strong>CI o NIT</strong></td>
                <td>{{$prints->ci_nit}}</td>
            </tr>
            <tr>
                <td><strong>CAMPAÑA</strong></td>
                <td>Lotengo!</td>
                <td><strong>E-MAIL</strong></td>
                <td>{{$prints->email}}</td>
            </tr>
            <tr>
                <td><strong>MONTO TOTAL FACTURAS</strong></td>
                <td>Bs.- {{$prints->monto_acumulado}}</td>
                <td><strong>CANT. CARTONES</strong></td>
                <td>{{$prints->qty_boletos}}</td>
            </tr>
            <tr>
                <td><strong>Nº DE REGISTRO</strong></td>
                <td>{{$prints->id_transaccion}}</td>
                <td><strong>CARTONES HABILITADOS</strong></td>
                <td>{{$prints->habilitados}}</td>
            </tr>
            <tr style="height: 100px;">
                <td><strong>FECHA</strong></td>
                <td>{{$prints->fecha}}</td>
                <td><strong>FIRMA CLIENTE</strong></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    @endforeach
</body>

</html>