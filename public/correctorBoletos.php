<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lotengo2023";
$base_number = 0;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, habilitados
        FROM transaccions;";

$result = $conn->query($sql);

while ($row = mysqli_fetch_assoc($result)) {
    //Explotar los números
    $id_trans = $row['id'];
    $id_habilitados =  $row['habilitados'];

    $one = explode('[', $id_habilitados);
    $two = explode(']', $one[1]);
    $three = explode(',', $two[0]);
    $count = count($three);

    for ($i = 0; $i < $count; $i++) {
        $serie = $three[$i];

        $sql2 = "UPDATE boletos
        SET id_transaccion = '$id_trans'
        WHERE id = $serie";

        if ($conn->query($sql2) === TRUE) {
            echo 'Record ' . $serie . ' updated successfully<br>';
        } else {
            echo 'Error updating record: ' . $conn->error . '<br>';
        }
    }
}

/* for ($i = 1; $i <= $num_rows; $i++) {

    echo 'Transacción: ' . $row['id']  . '<br>';
    $id_transaction =  $row['id'];
    $sql = "UPDATE boletos SET id_transaccion = '$id_transaction' WHERE serie = $i";
    $sql = "UPDATE boletos SET id_participante='$row' WHERE id=2";
} */
$conn->close();
