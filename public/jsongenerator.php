<?php
header('Content-Type: application/json; charset=utf-8');
if (isset($_GET['hash'])) {
    //set variables
    $servername = "localhost";
    $username = "prorepos_jordan";
    $password = "LguwWd_=Xs4a";
    $dbname = "prorepos_lotengo2023";
    $data = $_GET['hash'];
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT boletos.id, nombre, ci_nit, telefono, md5hash, numeros
        FROM boletos
        JOIN transaccions
        ON transaccions.id = boletos.id_transaccion
        JOIN participantes
        ON participantes.id = transaccions.id_participante
        WHERE boletos.habilitado = 0
        AND md5hash = '$data';";

    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    if ($row['id'] == null || $row['id'] == '') {
        print_r('[]');
    } else {
        foreach ($row as $key => $value) {
            $res[$key] = utf8_encode($value);
        }

        $json = json_encode($res);

        print_r($json);

        $result->free_result();
        $conn->close();
    }
} else {
    print_r('[]');
}
