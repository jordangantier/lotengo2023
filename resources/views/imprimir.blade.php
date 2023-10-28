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
                <td>{{$toPrint->nombre}}</td>
                <td><strong>ASIF</strong></td>
                <td>{{$toPrint->usuario}}</td>
            </tr>
            <tr>
                <td><strong>TELEFONO</strong></td>
                <td>{{$toPrint->telefono}}</td>
                <td><strong>CI o NIT</strong></td>
                <td>{{$toPrint->ci_nit}}</td>
            </tr>
            <tr>
                <td><strong>CAMPAÑA</strong></td>
                <td>Lotengo!</td>
                <td><strong>E-MAIL</strong></td>
                <td>{{$toPrint->email}}</td>
            </tr>
            <tr>
                <td><strong>MONTO TOTAL FACTURAS</strong></td>
                <td>Bs.- {{$toPrint->monto_acumulado}}</td>
                <td><strong>CANT. CARTONES</strong></td>
                <td>{{$toPrint->qty_boletos}}</td>
            </tr>
            <tr>
                <td><strong>Nº DE REGISTRO</strong></td>
                <td>{{$toPrint->id_transaccion}}</td>
                <td><strong>CARTONES HABILITADOS</strong></td>
                <td>{{$toPrint->habilitados}}</td>
            </tr>
            <tr style="height: 100px;">
                <td><strong>FECHA</strong></td>
                <td>{{$toPrint->fecha}}</td>
                <td><strong>FIRMA CLIENTE</strong></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</body>

</html>